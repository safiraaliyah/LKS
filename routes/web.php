<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;

use App\Http\Controllers\HistoriController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\UploadDataController;
use App\Http\Controllers\AuthController;

//USER
Route::get('/', [HomeController::class, 'index']);
Route::get('/profil/{id}', [ProfilController::class, 'show']);
Route::get('/uploadData', [UploadDataController::class, 'index']);
Route::get('/editProfil/{id}', [EditProfilController::class, 'index']);
Route::post('/updateProfil/{id}', [EditProfilController::class, 'update'])->name('updateProfil');


//ADMIN
Route::get('/admin', [HomeAdminController::class, 'index']);
Route::get('/history', [HistoriController::class, 'index']);
Route::get('/management', [ManagementController::class, 'index']);


// Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.admin-login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.admin-login.submit');
