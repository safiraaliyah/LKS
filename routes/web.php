<?php

  use App\Http\Controllers\AuthAdminController;
  use App\Http\Controllers\AuthLKSController;
  use App\Http\Controllers\SessionController;
  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\HomeController;
  use App\Http\Controllers\ProfilController;

  use App\Http\Controllers\HistoriController;
  use App\Http\Controllers\HomeAdminController;
  use App\Http\Controllers\EditProfilController;
  use App\Http\Controllers\ManagementController;
  use App\Http\Controllers\UploadDataController;

  //USER
  Route::get('/', [HomeController::class, 'index'])->name('home');
  Route::get('/profile/{id}', [ProfilController::class, 'show'])->middleware('auth');
  Route::get('/uploadData', [UploadDataController::class, 'index']);
  Route::get('/editProfile/{id}', [EditProfilController::class, 'index']);
  Route::post('/updateProfile/{id}', [EditProfilController::class, 'update'])->name('updateProfile');

  // Authentication
  Route::get('/login-lks', [AuthLKSController::class, 'show'])->name('login-lks')->middleware('guest');
  Route::post('/login-lks-post', [AuthLKSController::class, 'login'])->name('lks.lks-login.submit')->middleware('guest');
  Route::get('/login-admin', [AuthAdminController::class, 'show'])->name('admin.admin-login')->middleware('guest');
  Route::post('/login-admin-post', [AuthAdminController::class, 'login'])->name('admin.admin-login.submit')->middleware('guest');

  //ADMIN
  Route::get('/admin', [HomeAdminController::class, 'index']);
  Route::get('/history', [HistoriController::class, 'index']);
  Route::get('/management', [ManagementController::class, 'index']);

  Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

  Route::fallback(function () {
    return view('404');
  });