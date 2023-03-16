<?php

use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DisposisiSuratController;
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

// disposisi surat
Route::get('disposisi-surat/{id}/surat-masuk',[DisposisiSuratController::class,'index'])->name('disposisi-surat.index');
Route::get('disposisi-surat/{id}/surat-masuk/create',[DisposisiSuratController::class,'create'])->name('disposisi-surat.create');
Route::post('disposisi-surat/{id}/surat-masuk/create',[DisposisiSuratController::class,'store'])->name('disposisi-surat.store');
Route::get('disposisi-surat/{id}/edit',[DisposisiSuratController::class,'edit'])->name('disposisi-surat.edit');
Route::patch('disposisi-surat/{id}/edit',[DisposisiSuratController::class,'update'])->name('disposisi-surat.update');
Route::delete('disposisi-surat/{id}',[DisposisiSuratController::class,'destroy'])->name('disposisi-surat.destroy');
