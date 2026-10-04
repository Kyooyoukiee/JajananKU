<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JajanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori-jajanan', [KategoriController::class, 'kategori_jajanan']);
Route::get('/kategori-jajanan/tambah', [KategoriController::class, 'tambah_kategori_jajanan']);
Route::post('/kategori-jajanan/simpan', [KategoriController::class, 'simpan_kategori_jajanan']);
Route::get('/kategori-jajanan/{id}/hapus', [KategoriController::class, 'hapus_kategori_jajanan']);
Route::get('/kategori-jajanan/{id}/edit', [KategoriController::class, 'edit_kategori_jajanan']);
Route::post('/kategori-jajanan/{id}/simpanedit', [KategoriController::class, 'simpan_kategori_jajanan']);

Route::get('/jajanan', [JajanController::class, 'index']);
Route::get('/jajanan/tambah', [JajanController::class, 'tambah_jajanan']);
Route::post('/jajanan/simpan', [JajanController::class, 'simpan_jajanan']);
Route::get('/jajanan/{id}/hapus', [JajanController::class, 'hapus_jajanan']);
Route::get('/jajanan/{id}/edit', [JajanController::class, 'edit_jajanan']);
Route::post('/jajanan/{id}/simpanedit', [JajanController::class, 'simpan_jajanan']);

Route::get('/jajanan/rekap', [JajanController::class, 'rekap_jajanan']);