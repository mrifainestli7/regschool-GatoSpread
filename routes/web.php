<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', [SesiController::class, 'index']);
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/staff/home', [StaffController::class, 'index'])->middleware('userAkses:staff');
    Route::get('/staff/tambah-sekolah', [StaffController::class, 'tambahSekolah'])->middleware('userAkses:staff');
    Route::get('/staff/profile', [StaffController::class, 'profile'])->middleware('userAkses:staff');

    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/admin/home', [AdminController::class, 'index'])->middleware('userAkses:admin')->name('admin.home');
    Route::get('/admin/tambah-akun', [AdminController::class, 'tambahAkun'])->middleware('userAkses:admin')->name('admin.tambahAkun');
    Route::post('/admin/tambah-akun', [AdminController::class, 'setAkun'])->middleware('userAkses:admin')->name('admin.tambahAkun');
    Route::get('/admin/hapus-akun/{id}', [AdminController::class, 'remove'])->middleware('userAkses:admin')->name('admin.hapusAkun');
    Route::get('/admin/detail-akun/{id}', [AdminController::class, 'detailAkun'])->middleware('userAkses:admin')->name('admin.detail-akun');
    Route::post('/admin/detail-akun/{id}', [AdminController::class, 'editAkun'])->middleware('userAkses:admin');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->middleware('userAkses:admin');

    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::get('/', function () {
    return view('welcome');
});