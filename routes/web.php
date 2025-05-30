<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\MachineController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\PreventiveScheduleController;
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


    // Pemeriksaan Mesin
    Route::view('/admin/pemeriksaan', 'admin.pemeriksaan')->name('pemeriksaan.index');

    // Perbaikan & Suku Cadang
    Route::view('/admin/perbaikan', 'admin.perbaikan')->name('perbaikan.index');

    // Laporan
    Route::view('/admin/laporan/mesin', 'admin.laporan.mesin')->name('laporan.mesin');
    Route::view('/admin/laporan/perawatan', 'admin.laporan.perawatan')->name('laporan.perawatan');
    Route::view('/admin/laporan/perbaikan', 'admin.laporan.perbaikan')->name('laporan.perbaikan');

    // Manajemen User (opsional)
    Route::view('/admin/users', 'admin.users')->name('user.index');
});

require __DIR__ . '/auth.php';
