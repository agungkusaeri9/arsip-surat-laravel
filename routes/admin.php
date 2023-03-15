<?php

use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KlasifikasiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SifatSuratController;
use App\Http\Controllers\Admin\SuratKeluarController;
use App\Http\Controllers\Admin\SuratMasukController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class,'index'])->name('dashboard');
Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
Route::post('/profile',[ProfileController::class,'update'])->name('profile.update');
Route::get('/change-password',[ChangePasswordController::class,'index'])->name('change-password.index');
Route::post('/change-password',[ChangePasswordController::class,'update'])->name('change-password.update');

Route::resource('users',UserController::class)->except('show');

// klasifikasi
Route::resource('klasifikasi',KlasifikasiController::class)->except('show');

// sifat-surat
Route::resource('sifat-surat',SifatSuratController::class)->except('show');

// surat-masuk
Route::resource('surat-masuk',SuratMasukController::class);
Route::get('surat-masuk/{id}/download',[SuratMasukController::class,'download'])->name('surat-masuk.download');

// surat-keluar
Route::resource('surat-keluar',SuratKeluarController::class);
Route::get('surat-keluar/{id}/download',[SuratKeluarController::class,'download'])->name('surat-keluar.download');
