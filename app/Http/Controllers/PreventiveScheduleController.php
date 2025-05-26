<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Machine;
use App\Models\PreventiveSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreventiveScheduleController extends Controller
{
    public function index()
    {
        $schedules = PreventiveSchedule::with('machine', 'creator')->latest()->get();
        return view('admin.preventive-schedules.index', compact('schedules'));
    }

    public function create()
    {
        $machines = Machine::all();
        return view('admin.preventive-schedules.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'period_week' => 'required|integer|min:1',
            'period' => ['required', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
            'description' => 'nullable|string',
        ]);

        $validated['period'] .= '-01'; // tambahkan hari pertama agar valid sebagai DATE
        $validated['created_by'] = Auth::id();
        $validated['approval_status'] = 'pending';
        $validated['approved_by_head'] = false;
        $validated['approved_by_department'] = false;
        $validated['approved_by_head_at'] = null;
        $validated['approved_by_department_at'] = null;

        PreventiveSchedule::create($validated);

        return redirect()->route('preventive-schedules.index')->with('success', '✅ Jadwal berhasil diajukan.');
    }


    public function show(PreventiveSchedule $preventive_schedule)
    {
        return view('admin.preventive-schedules.show', compact('preventive_schedule'));
    }

    public function edit(PreventiveSchedule $preventive_schedule)
    {
        $machines = Machine::all();
        return view('admin.preventive-schedules.edit', compact('preventive_schedule', 'machines'));
    }

    public function update(Request $request, PreventiveSchedule $preventive_schedule)
    {
        $validated = $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'period_week' => 'required|integer|min:1',
            'period' => ['required', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
            'description' => 'nullable|string',
        ]);

        $validated['period'] .= '-01';
        $preventive_schedule->update($validated);

        return redirect()->route('preventive-schedules.index')->with('success', '✅ Jadwal berhasil diperbarui.');
    }

    public function destroy(PreventiveSchedule $preventive_schedule)
    {
        $preventive_schedule->delete();
        return back()->with('success', '🗑️ Jadwal berhasil dihapus.');
    }

    public function approve(PreventiveSchedule $preventive_schedule)
    {
        $user = Auth::user();

        if ($user->role === 'kepala_bengkel') {
            $preventive_schedule->approved_by_head = true;
            $preventive_schedule->approved_by_head_at = now();
        } elseif ($user->role === 'kepala_jurusan') {
            $preventive_schedule->approved_by_department = true;
            $preventive_schedule->approved_by_department_at = now();
        }

        if ($preventive_schedule->approved_by_head && $preventive_schedule->approved_by_department) {
            $preventive_schedule->approval_status = 'approved';
        }

        $preventive_schedule->save();

        return back()->with('success', '✅ Jadwal berhasil disetujui.');
    }


    public function reject(PreventiveSchedule $preventive_schedule)
    {
        $preventive_schedule->approval_status = 'rejected';
        $preventive_schedule->save();

        return back()->with('warning', '⚠️ Jadwal ditolak.');
    }
}
