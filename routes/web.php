<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\KoinController;
use App\Http\Controllers\KategoriController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Routes untuk Resep
Route::resource('resep', ResepController::class);
Route::get('/resep/create', [ResepController::class, 'create'])->name('resep.create');
Route::post('/resep', [ResepController::class, 'store'])->name('resep.store');
Route::get('/resep/{id}/edit', [ResepController::class, 'edit'])->name('resep.edit');
Route::put('/resep/{id}', [ResepController::class, 'update'])->name('resep.update');
Route::delete('/resep/{id}', [ResepController::class, 'destroy'])->name('resep.destroy');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/edit/{index}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{index}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/delete/{index}', [KategoriController::class, 'delete'])->name('kategori.delete');
Route::get('/dashboard', [KategoriController::class, 'dashboard'])->name('dashboard');

Route::get('/koin', [KoinController::class, 'showKoin'])->name('koin.index');
Route::get('/koin/topup', [KoinController::class, 'showTopUp'])->name('koin.topup');
Route::post('/koin/topup', [KoinController::class, 'processTopUp'])->name('koin.topup.proses');
Route::get('/koin/tarik', [KoinController::class, 'showTarik'])->name('koin.tarik');
Route::post('/koin/tarik', [KoinController::class, 'processTarik'])->name('koin.tarik.proses');
Route::get('/dashboard', [KoinController::class, 'showDashboard'])->name('dashboard');
Route::delete('/koin/delete/{id}', [KoinController::class, 'deleteTransaksi'])->name('koin.delete');
Route::get('/', fn() => redirect()->route('koin.index'));