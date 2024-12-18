<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Ekskul\EkskulController;
use App\Http\Controllers\EkskulMemberController;
use App\Http\Controllers\Jadwal\JadwalController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [EkskulController::class, 'dashboard'])->name('dashboard');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/absensi/{id}', [AbsensiController::class, 'show'])->name('absensi.show')->whereNumber('id');



// --- User ---
Route::middleware('role:admin,pembina')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->whereNumber('id');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update')->whereNumber('id');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->whereNumber('id');
    Route::get('/absensi/export/excel', [AbsensiController::class, 'export_Excel']);
});

// --- Ekskul ---
Route::middleware('role:admin')->group(function () {
    Route::get('/ekskul/create', [EkskulController::class, 'create'])->name('ekskul.create');
    Route::get('/ekskul/{id}/edit', [EkskulController::class, 'edit'])->name('ekskul.edit');
    Route::post('/ekskul', [EkskulController::class, 'store'])->name('ekskul.store');
    Route::patch('/ekskul/{id}', [EkskulController::class, 'update'])->name('ekskul.update');
    Route::delete('/ekskul/{id}', [EkskulController::class, 'destroy'])->name('ekskul.destroy');
    Route::get('/absensi/export/{ekskul}', [AbsensiController::class, 'export'])->name('absensi.export');


});

Route::middleware('role:admin,user')->group(function () {
    Route::get('/ekskul', [EkskulController::class, 'index'])->name('ekskul.index');
});

Route::middleware('role:admin,pembina')->group(function () {
    Route::get('/absensi/export/{ekskul}', [AbsensiController::class, 'export'])->name('absensi.export');
});
Route::middleware('role:admin,user,pelatih,pembina')->group(function () {
    Route::get('/ekskul/{id}', [EkskulController::class, 'show'])->name('ekskul.show')->whereNumber('id');
});

Route::middleware('role:user')->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
});

Route::middleware('role:pelatih')->group(function () {
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
    Route::get('/validasi/{id}', [JadwalController::class, 'validasi'])->name('jadwal.validasi')->whereNumber('id');
    Route::patch('/validasi/{id}/approve', [JadwalController::class, 'approve'])->name('jadwal.approve');
    Route::patch('/validasi/{id}/reject', [JadwalController::class, 'reject'])->name('jadwal.reject');


});

Route::middleware('role:admin,pelatih,pembina')->group(function () {
    Route::get('/pendaftaran/show', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
    Route::get('/penilaian/{id}', [PenilaianController::class, 'show'])->name('penilaian.show')->whereNumber('id');
});

Route::middleware('role:pembina')->group(function () {

    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::patch('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
});

// Route::middleware('role:admin')->group(function () {
//     Route::get('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
// });

Route::middleware('role:pembina')->group(function () {
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::patch('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
});

});
require __DIR__.'/auth.php';
    