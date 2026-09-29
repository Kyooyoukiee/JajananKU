<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JajanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori/jajanan', [KategoriController::class, 'kategori_jajanan']);
Route::get('/tambah/kategori/jajanan', [KategoriController::class, 'tambah_kategori_jajanan']);
Route::post('/simpan/kategori/jajanan', [KategoriController::class, 'simpan_kategori_jajanan']);
Route::get('/hapus/kategori/jajanan/{id}', [KategoriController::class, 'hapus_kategori_jajanan']);
Route::get('/edit/kategori/jajanan/{id}', [KategoriController::class, 'edit_kategori_jajanan']);
Route::post('/simpanedit/kategori/jajanan/{id}', [KategoriController::class, 'simpan_kategori_jajanan']);