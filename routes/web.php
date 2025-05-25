<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\MachineController;
use App\Http\Controllers\ComponentController;
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

    Route::get('/admin/machines', [MachineController::class, 'index'])->name('machines.index');
    Route::get('/admin/machines/create', [MachineController::class, 'create'])->name('machines.create');
    // Route::get('/admin/machines/edit', [MachineController::class, 'edit'])->name('machines.edit');
    Route::post('/admin/machines', [MachineController::class, 'store'])->name('machines.store');
    Route::get('/admin/machines/{machine}/edit', [MachineController::class, 'edit'])->name('machines.edit');
    Route::put('/admin/machines/{machine}', [MachineController::class, 'update'])->name('machines.update');
    Route::delete('/admin/machines/{machine}', [MachineController::class, 'destroy'])->name('machines.destroy');


    Route::get('/admin/machines/{machine}/components', [ComponentController::class, 'index'])->name('components.index');
    Route::get('/admin/machines/{machine}/components/create', [ComponentController::class, 'create'])->name('components.create');
    Route::post('/machines/{machine}/components', [ComponentController::class, 'store'])->name('components.store');
    Route::delete('/machines/{machine}/components/{component}', [ComponentController::class, 'destroy'])->name('components.destroy');
    Route::get('/admin/machines/{machine}/components/edit', [ComponentController::class, 'edit'])->name('components.edit');
    Route::put('/admin/machines/{machine}/components', [ComponentController::class, 'update'])->name('components.update');



    Route::get('/admin/machines/{machine}/components/json', function (App\Models\Machine $machine) {
        return response()->json($machine->components);
    });


    // Jadwal Perawatan Preventif
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
