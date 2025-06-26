<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\MachineController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\PreventiveScheduleController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\MachineChecklistController;
use App\Http\Controllers\RepairLogController;
use App\Http\Controllers\SparepartReplacementController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    //Machines
    Route::get('/machines', [MachineController::class, 'index'])->name('machines.index');
    Route::get('/machines/create', [MachineController::class, 'create'])->name('machines.create');
    // Route::get('/machines/edit', [MachineController::class, 'edit'])->name('machines.edit');
    Route::post('/machines', [MachineController::class, 'store'])->name('machines.store');
    Route::get('/machines/{machine}/edit', [MachineController::class, 'edit'])->name('machines.edit');
    Route::put('/machines/{machine}', [MachineController::class, 'update'])->name('machines.update');
    Route::delete('/machines/{machine}', [MachineController::class, 'destroy'])->name('machines.destroy');


    //Component Machines
    Route::get('/machines/{machine}/components', [ComponentController::class, 'index'])->name('components.index');
    Route::get('/machines/{machine}/components/create', [ComponentController::class, 'create'])->name('components.create');
    Route::post('/machines/{machine}/components', [ComponentController::class, 'store'])->name('components.store');
    Route::delete('/machines/{machine}/components/{component}', [ComponentController::class, 'destroy'])->name('components.destroy');
    Route::get('/machines/{machine}/components/edit', [ComponentController::class, 'edit'])->name('components.edit');
    Route::put('/machines/{machine}/components', [ComponentController::class, 'update'])->name('components.update');

    Route::get('/machines/{machine}/components/json', function (App\Models\Machine $machine) {
        return response()->json($machine->components);
    });


    // Spareparts
    Route::get('/spareparts', [SparepartController::class, 'index'])->name('spareparts.index');
    Route::get('/spareparts/create', [SparepartController::class, 'create'])->name('spareparts.create');
    Route::post('/spareparts', [SparepartController::class, 'store'])->name('spareparts.store');
    Route::get('/spareparts/{sparepart}/request', [SparepartController::class, 'requestForm'])->name('spareparts.request');
    // Route::post('/spareparts/request', [SparepartController::class, 'submitRequest'])->name('spareparts.submit-request');
    Route::post('/spareparts/{sparepart}/request', [SparepartController::class, 'submitRequest'])->name('spareparts.submit-request');



    Route::get('/spareparts/history', [SparepartController::class, 'history'])->name('spareparts.history');
    Route::get('/spareparts/request/{request}/print', [SparepartController::class, 'printRequest'])->name('spareparts.print-request');
    Route::put('/spareparts/{request}/approve', [SparepartController::class, 'approveRequest'])->name('spareparts.approve-request');
    Route::put('/spareparts/{request}/reject', [SparepartController::class, 'rejectRequest'])->name('sparepart-requests.reject');
    Route::get('/spareparts/listrequests', [SparepartController::class, 'listrequests'])->name('sparepart.requests-listrequests');



    // Jadwal Perawatan Preventif
    // Preventive Schedule (Jadwal Perawatan Preventif)
    Route::get('/preventive-schedules', [PreventiveScheduleController::class, 'index'])->name('preventive-schedules.index');
    Route::get('/preventive-schedules/create', [PreventiveScheduleController::class, 'create'])->name('preventive-schedules.create');
    Route::post('/preventive-schedules', [PreventiveScheduleController::class, 'store'])->name('preventive-schedules.store');
    Route::get('/preventive-schedules/{preventive_schedule}', [PreventiveScheduleController::class, 'show'])->name('preventive-schedules.show');
    Route::get('/preventive-schedules/{preventive_schedule}/edit', [PreventiveScheduleController::class, 'edit'])->name('preventive-schedules.edit');
    Route::put('/preventive-schedules/{preventive_schedule}', [PreventiveScheduleController::class, 'update'])->name('preventive-schedules.update');
    Route::delete('/preventive-schedules/{preventive_schedule}', [PreventiveScheduleController::class, 'destroy'])->name('preventive-schedules.destroy');

    // Approval khusus
    Route::post('/preventive-schedules/{preventive_schedule}/approve', [PreventiveScheduleController::class, 'approve'])->name('preventive-schedules.approve');
    Route::post('/preventive-schedules/{preventive_schedule}/reject', [PreventiveScheduleController::class, 'reject'])->name('preventive-schedules.reject');
    Route::view('/admin/jadwal', 'admin.jadwal')->name('jadwal.index');


    // Jadwal Maintenance Request
    // Preventive Schedule (Jadwal Maintenance Request)
    Route::get('/maintenance-requests', [MaintenanceRequestController::class, 'index'])->name('maintenance-requests.index');
    Route::get('/maintenance-requests/create', [MaintenanceRequestController::class, 'create'])->name('maintenance-requests.create');
    Route::post('/maintenance-requests', [MaintenanceRequestController::class, 'store'])->name('maintenance-requests.store');
    Route::get('/maintenance-requests/{maintenance_requests}', [MaintenanceRequestController::class, 'show'])->name('maintenance-requests.show');
    Route::get('/maintenance-requests/{maintenance_requests}/edit', [MaintenanceRequestController::class, 'edit'])->name('maintenance-requests.edit');
    Route::put('/maintenance-requests/{maintenance_requests}', [MaintenanceRequestController::class, 'update'])->name('maintenance-requests.update');
    Route::delete('/maintenance-requests/{maintenance_requests}', [MaintenanceRequestController::class, 'destroy'])->name('maintenance-requests.destroy');

    // Approval khusus
    Route::post('/maintenance-requests/{maintenance_requests}/approve', [MaintenanceRequestController::class, 'approve'])->name('maintenance-requests.approve');
    Route::post('/maintenance-requests/{maintenance_requests}/reject', [MaintenanceRequestController::class, 'reject'])->name('maintenance-requests.reject');
    Route::view('/admin/jadwal', 'admin.jadwal')->name('jadwal.index');


    // Pemeriksaan Mesin
    Route::get('/machine-checklist', [MachineChecklistController::class, 'index'])->name('checklists.index');
    Route::get('/machine-checklist/{schedule}/create', [MachineChecklistController::class, 'create'])->name('checklists.create');
    Route::post('/machine-checklist/{schedule}', [MachineChecklistController::class, 'store'])->name('checklists.store');
    Route::get('/machine-checklist/{checklist}', [MachineChecklistController::class, 'show'])->name('checklists.show');



    // Perbaikan 
    Route::view('/admin/perbaikan', 'admin.perbaikan')->name('perbaikan.index');
    Route::get('/repairs', [RepairLogController::class, 'index'])->name('repairs.index');
    Route::get('/repairs/create', [RepairLogController::class, 'create'])->name('repairs.create');
    Route::post('/repairs/store', [RepairLogController::class, 'store'])->name('repairs.store');
    Route::get('/repairs/{repair}/preview', [RepairLogController::class, 'show'])->name('repairs.show');

    // Replacement parts
    Route::get('/replacements', [SparepartReplacementController::class, 'index'])->name('replacements.index');
    Route::get('/replacements/create', [SparepartReplacementController::class, 'create'])->name('replacements.create');
    Route::post('/replacements', [SparepartReplacementController::class, 'store'])->name('replacements.store');

    // Laporan
    // Route::view('/admin/laporan/mesin', 'admin.laporan.mesin')->name('laporan.mesin');
    // Route::view('/admin/laporan/perawatan', 'admin.laporan.perawatan')->name('laporan.perawatan');
    // Route::view('/admin/laporan/perbaikan', 'admin.laporan.perbaikan')->name('laporan.perbaikan');

    Route::get('/laporan/mesin', [ReportController::class, 'machineReport'])->name('laporan.mesin');
    Route::get('/laporan/mesin/export', [ReportController::class, 'exportMachineReport'])->name('laporan.mesin.export');

    Route::get('/laporan/perawatan', [ReportController::class, 'maintenanceReport'])->name('laporan.perawatan');
    Route::get('/laporan/perawatan/export', [ReportController::class, 'exportMaintenanceReport'])->name('laporan.perawatan.export');

    // Laporan Perbaikan
    Route::get('/laporan/perbaikan', [ReportController::class, 'repairReport'])->name('laporan.perbaikan');
    Route::get('/laporan/perbaikan/export', [ReportController::class, 'exportRepairReport'])->name('laporan.perbaikan.export');


    Route::get('/laporan/penggantian', [ReportController::class, 'replacementReport'])->name('laporan.penggantian');
    Route::get('/laporan/penggantian/export', [ReportController::class, 'exportReplacementReport'])->name('laporan.penggantian.export');

    // Manajemen User (opsional)
    // Route::view('/admin/users', 'admin.users')->name('user.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::put('/users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('users.reset-password');
});

require __DIR__ . '/auth.php';
