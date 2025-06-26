<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MachineExport;

use App\Models\MaintenanceRequest;
use App\Exports\MaintenanceExport;

use App\Models\RepairLog;
use App\Exports\RepairExport;
use Carbon\Carbon;

use App\Models\SparepartReplacement;
use App\Models\Sparepart;
use App\Exports\ReplacementExport;

class ReportController extends Controller
{
    public function machineReport()
    {
        $machines = Machine::with('components')->get();
        return view('admin.reports.machines.index', compact('machines'));
    }

    public function exportMachineReport()
    {
        return Excel::download(new MachineExport, 'laporan_data_mesin.xlsx');
    }

    public function maintenanceReport(Request $request)
    {
        $machines = Machine::all();
        $query = MaintenanceRequest::with('machine');

        if ($request->filled('machine_id')) {
            $query->where('machine_id', $request->machine_id);
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereDate('created_at', '>=', $request->start_date)
                ->whereDate('created_at', '<=', $request->end_date);
        }

        $results = $query->get();

        return view('admin.reports.maintenance.index', compact('machines', 'results'));
    }

    public function exportMaintenanceReport(Request $request)
    {
        return Excel::download(new MaintenanceExport($request), 'laporan_perawatan.xlsx');
    }

    public function repairReport(Request $request)
    {
        $machines = Machine::select('id', 'code', 'name')->get();

        $query = RepairLog::with(['machine', 'repairedBy']);

        if ($request->machine_id) {
            $query->where('machine_id', $request->machine_id);
        }

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('repair_date_start', [$request->start_date, $request->end_date]);
        }

        $results = $query->get();

        return view('admin.reports.repairs.index', compact('results', 'machines'));
    }

    public function exportRepairReport(Request $request)
    {
        return Excel::download(new RepairExport($request), 'laporan_perbaikan_mesin.xlsx');
    }

    public function replacementReport(Request $request)
    {
        $spareparts = Sparepart::all();

        $query = SparepartReplacement::with(['sparepart', 'machine']);

        // Filter berdasarkan sparepart
        if ($request->filled('sparepart_id')) {
            $query->where('sparepart_id', $request->sparepart_id);
        }

        // Filter berdasarkan tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('replacement_date', [$request->start_date, $request->end_date]);
        }

        $replacements = $query->latest()->get();

        return view('admin.reports.replacements.index', compact('replacements', 'spareparts'));
    }

    public function exportReplacementReport(Request $request)
    {
        return Excel::download(new ReplacementExport($request), 'laporan_penggantian_suku_cadang.xlsx');
    }
}
