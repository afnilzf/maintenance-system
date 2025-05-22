<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\MesinController;
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


    // Data Mesin & Komponen
    Route::view('/admin/mesin', 'admin.mesin')->name('mesin.index');
    Route::get('/admin/mesin', [MesinController::class, 'index'])->name('mesin.index');
    Route::get('/admin/mesin/create', [MesinController::class, 'create'])->name('mesin.create');
    Route::post('/admin/mesin', [MesinController::class, 'store'])->name('mesin.store');

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
