<?php

use App\Http\Controllers\KlinikController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\RekamController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;

Route::get("/", function (){
   return redirect()->route('login');
});
Auth::routes();

Route::get('/klinik', [KlinikController::class, 'klinik'])->name('klinik');

Route::resource('klinik',KlinikController::class);

Route::resource('pegawai',PegawaiController::class);

Route::resource('surat',SuratController::class);

Route::resource('rekam',RekamController::class);
Route::resource('detail',DetailController::class);

Route::resource('/obat', ObatController::class);

Route::post('/viewDetail', [DetailController::class, 'viewDetail'])->name('viewDetail');
Route::get('/viewDetail', [DetailController::class, 'viewDetail'])->name('viewDetail');


