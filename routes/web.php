<?php

  use App\Http\Controllers\AdminController;
  use App\Http\Controllers\AuthAdminController;
  use App\Http\Controllers\AuthLKSController;
  use App\Http\Controllers\LKSController;
  use App\Http\Controllers\SessionController;
  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\HomeController;
  use App\Http\Controllers\ProfilController;

  use App\Http\Controllers\HistoryController;
  use App\Http\Controllers\HomeAdminController;
  use App\Http\Controllers\EditProfilController;
  use App\Http\Controllers\ManagementController;
  use App\Http\Controllers\UploadDataController;

  // Guest
  Route::get('/', [HomeController::class, 'index'])->name('home');

  // Authentication
  Route::get('/login-lks', [AuthLKSController::class, 'show'])->name('login')->middleware('guest');
  Route::post('/login-lks-post', [AuthLKSController::class, 'login'])->name('lks.lks-login.submit')->middleware('guest');
  Route::get('/login-admin', [AuthAdminController::class, 'show'])->name('admin.admin-login')->middleware('guest');
  Route::post('/login-admin-post', [AuthAdminController::class, 'login'])->name('admin.admin-login.submit')->middleware('guest');

  // Profile
  Route::get('/profile/{name}', [ProfilController::class, 'show'])->name('profile.show');

  // LKS
  Route::middleware(['auth', 'lks'])->group(function () {
    Route::get('/profile', [LKSController::class, 'show'])->name('profile');
    Route::get('/form-lks', [LKSController::class, 'edit']);
    Route::get('/form-data', [LKSController::class, 'upload']);

    Route::post('/form-data-lks', [LKSController::class, 'update']);
    Route::post('/send-data-lks', [LKSController::class, 'send']);
  });

  // Admin
  Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [HomeAdminController::class, 'index']);
    Route::get('/history', [HistoryController::class, 'index']);
    Route::get('/management', [ManagementController::class, 'index']);

    Route::get('/update-laporan/{id}', [AdminController::class, 'edit_laporan']);
  });

  Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
  });

  Route::fallback(function () {
    return view('404');
  });