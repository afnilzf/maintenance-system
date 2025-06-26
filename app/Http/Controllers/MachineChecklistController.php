<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Component;
use App\Models\MachineChecklist;
use App\Models\MachineChecklistLine;
use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MachineChecklistController extends Controller
{
    //
    public function index()
    {
        $schedules = MaintenanceRequest::with(['machine', 'checklist.lines'])
            ->where('approval_status', 'approved')
            ->get();

        // dd($schedules);
        return view('admin.checklists.index', compact('schedules'));
    }

    public function create($scheduleId)
    {
        $schedule = MaintenanceRequest::with('machine.components')->findOrFail($scheduleId);

        return view('admin.checklists.create', [
            'schedule' => $schedule,
            'machine' => $schedule->machine,
            'components' => $schedule->machine->components,
        ]);
    }

    public function store(Request $request, $scheduleId)
    {
        $request->validate([
            'checked_at' => 'required|date',
            'components' => 'required|array',
            'components.*.component_id' => 'required|exists:components,id',
            'components.*.condition' => 'required|in:B,O,Rs,Rb',
            'components.*.treatment' => 'nullable|in:P,Lo,Lg,Pb',
            'components.*.note' => 'nullable|string',
        ]);

        $schedule = MaintenanceRequest::findOrFail($scheduleId);

        $checklist = MachineChecklist::create([
            'machine_id' => $schedule->machine_id,
            'schedule_id' => $schedule->id,
            'checked_by' => Auth::id(),
            'checked_at' => $request->checked_at,
        ]);

        $conditionCounts = [
            'B' => 0,
            'O' => 0,
            'Rs' => 0,
            'Rb' => 0,
        ];

        foreach ($request->components as $line) {
            MachineChecklistLine::create([
                'machine_checklist_id' => $checklist->id,
                'component_id' => $line['component_id'],
                'condition' => $line['condition'],
                'treatment' => $line['treatment'],
                'note' => $line['note'] ?? null,
            ]);
            $conditionCounts[$line['condition']]++;
        }

        // Update status mesin berdasarkan pemeriksaan terbaru
        $total = array_sum($conditionCounts);
        if ($total > 0) {
            arsort($conditionCounts);
            $dominant = key($conditionCounts);

            $status = match ($dominant) {
                'B' => 'good',
                'O' => 'medium',
                'Rs' => 'repaired',
                'Rb' => 'damaged',
                default => 'none',
            };

            if ($conditionCounts['Rb'] > 0) {
                $status = 'damaged';
            }

            $checklist->machine->update(['condition' => $status]);
        }

        return redirect()->route('checklists.index')->with('success', 'Pemeriksaan berhasil disimpan.');
    }

    public function show($id)
    {
        $checklist = MachineChecklist::with(['machine', 'schedule', 'lines.component'])->findOrFail($id);

        // dd($checklist);
        return view('admin.checklists.show', compact('checklist'));
    }
}
