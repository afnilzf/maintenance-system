<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Machine;
use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceRequestController extends Controller
{
    public function index()
    {
        $schedules = MaintenanceRequest::with('machine', 'creator')->latest()->get();
        return view('admin.maintenance-requests.index', compact('schedules'));
    }

    public function create()
    {
        $machines = Machine::all();
        return view('admin.maintenance-requests.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'period_week' => 'required|integer|min:1',
            'period' => 'required|date_format:Y-m',
            'cycle_type' => 'required|string',
            'interval_month' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        // Pisahkan bulan dan tahun dari input <input type="month">
        [$year, $month] = explode('-', $validated['period']);

        $requestData = [
            'machine_id' => $validated['machine_id'],
            'created_by' => auth()->id(),
            'period_week' => $validated['period_week'],
            'period_month' => (int) $month,
            'period_year' => (int) $year,
            'cycle_type' => $validated['cycle_type'],
            'interval_month' => $validated['interval_month'],
            'description' => $validated['description'] ?? null,
            'approval_status' => 'pending',
        ];

        MaintenanceRequest::create($requestData);

        return redirect()->route('maintenance-requests.index')->with('success', 'Pengajuan perawatan berhasil diajukan.');
    }



    public function show(MaintenanceRequest $maintenance_requests)
    {
        return view('admin.maintenance-requests.show', compact('maintenance_requests'));
    }

    public function edit(MaintenanceRequest $maintenance_requests)
    {
        $machines = Machine::all();
        return view('admin.maintenance-requests.edit', compact('maintenance_requests', 'machines'));
    }

    public function update(Request $request, MaintenanceRequest $maintenance_requests)
    {
        $validated = $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'period_week' => 'required|integer|min:1',
            'period' => ['required', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
            'description' => 'nullable|string',
        ]);

        $validated['period'] .= '-01';
        $maintenance_requests->update($validated);

        return redirect()->route('maintenance-requests.index')->with('success', '✅ Jadwal berhasil diperbarui.');
    }

    public function destroy(MaintenanceRequest $maintenance_requests)
    {
        $maintenance_requests->delete();
        return back()->with('success', '🗑️ Jadwal berhasil dihapus.');
    }

    public function approve(MaintenanceRequest $maintenance_requests)
    {
        $user = Auth::user();

        if ($maintenance_requests->approved_by_head && $maintenance_requests->approved_by_department) {
        }
        $maintenance_requests->approval_status = 'approved';

        $maintenance_requests->save();

        return back()->with('success', '✅ Jadwal berhasil disetujui.');
    }


    public function reject(MaintenanceRequest $maintenance_requests)
    {
        $maintenance_requests->approval_status = 'rejected';
        $maintenance_requests->save();

        return back()->with('warning', '⚠️ Jadwal ditolak.');
    }
}
