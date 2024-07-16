<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\UploadDataController;

  use App\Http\Controllers\AuthAdminController;
  use App\Http\Controllers\AuthLKSController;
use App\Http\Controllers\LKSController;
use App\Http\Controllers\SessionController;



  // Guest
  Route::get('/', [HomeController::class, 'index'])->name('home');

  // Authentication
  Route::get('/login-lks', [AuthLKSController::class, 'show'])->name('login-lks')->middleware('guest');
  Route::post('/login-lks-post', [AuthLKSController::class, 'login'])->name('lks.lks-login.submit')->middleware('guest');
  Route::get('/login-admin', [AuthAdminController::class, 'show'])->name('admin.admin-login')->middleware('guest');
  Route::post('/login-admin-post', [AuthAdminController::class, 'login'])->name('admin.admin-login.submit')->middleware('guest');

  // LKS
  Route::get('/profile', [LKSController::class, 'show'])->name('profile')->middleware('auth');
  Route::get('/uploadData', [UploadDataController::class, 'index']);
  Route::get('/form-lks', [LKSController::class, 'edit'])->middleware('auth');
  Route::post('/updateProfile/{id}', [EditProfilController::class, 'update'])->name('updateProfile');
  Route::post('/form-data-lks', [LKSController::class, 'update']);

  // Admin
  Route::get('/admin', [HomeAdminController::class, 'index']);
  Route::get('/history', [HistoriController::class, 'index']);
  Route::get('/management', [ManagementController::class, 'index']);


// Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.admin-login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.admin-login.submit');
Route::get('/loginLks', [LksController::class, 'showLoginForm'])->name('admin.lks-login');
Route::post('/loginLks', [LksController::class, 'login'])->name('admin.lks-login.submit');

Route::get('/404', function () {
    return view('404');
});
  Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

  Route::fallback(function () {
    return view('404');
  });

