<?php

namespace App\Http\Controllers;

use App\Models\RepairLog;
use App\Models\RepairLogLines;
use App\Models\Machine;
use App\Models\MaintenanceRequest;
use App\Models\MachineChecklist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairLogController extends Controller
{
    public function index()
    {
        $repairs = RepairLog::with(['machine', 'user'])->latest()->get();
        return view('admin.repairs.index', compact('repairs'));
    }

    public function create()
    {
        // Ambil semua mesin yang memiliki pengajuan disetujui
        $machineIds = MaintenanceRequest::where('approval_status', 'approved')
            ->pluck('machine_id');

        // Cek mesin yang sudah dilakukan perbaikan
        $repairedMachineIds = RepairLog::pluck('machine_id')->unique();

        // Ambil mesin yang belum pernah diperbaiki
        $machines = Machine::whereIn('id', $machineIds)
            ->whereNotIn('id', $repairedMachineIds)
            ->get();

        // Ambil daftar PLP jika admin login
        $plps = Auth::user()->role === 'admin' ? User::where('role', 'plp')->get() : null;

        return view('admin.repairs.create', compact('machines', 'plps'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'repair_date_start' => 'required|date',
            'repair_date_finish' => 'required|date|after_or_equal:repair_date_start',
            'lines' => 'required|array',
            'lines.*.part' => 'required|string',
            'lines.*.issue' => 'nullable|string',
            'lines.*.cause' => 'nullable|string',
            'lines.*.solution' => 'nullable|string',
        ]);

        $log = RepairLog::create([
            'machine_id' => $request->machine_id,
            'repaired_by' => Auth::user()->role === 'admin' ? $request->repaired_by : Auth::id(),
            'repair_date_start' => $request->repair_date_start,
            'repair_date_finish' => $request->repair_date_finish,
        ]);

        foreach ($request->lines as $line) {
            $log->lines()->create($line);
        }

        return redirect()->route('repairs.index')->with('success', 'Data perbaikan berhasil disimpan.');
    }

    public function show($id)
    {
        $repair = RepairLog::with(['machine', 'user', 'lines'])->findOrFail($id);
        return view('admin.repairs.show', compact('repair'));
    }
}
