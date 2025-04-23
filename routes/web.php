<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\KoinController;

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

use App\Http\Controllers\KategoriController;

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/edit/{index}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{index}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/delete/{index}', [KategoriController::class, 'delete'])->name('kategori.delete');
Route::get('/dashboard', [KategoriController::class, 'dashboard'])->name('dashboard');
