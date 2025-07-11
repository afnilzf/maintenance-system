<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\MaintenanceRequest;
use App\Models\MachineChecklist;
use App\Models\RepairLog;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMesin = Machine::count();
        $totalPerawatan = MaintenanceRequest::count();
        $totalPemeriksaan = MachineChecklist::count();
        $totalPerbaikan = RepairLog::count();

        return view('admin.dashboard', compact(
            'totalMesin',
            'totalPerawatan',
            'totalPemeriksaan',
            'totalPerbaikan'
        ));
    }
}
