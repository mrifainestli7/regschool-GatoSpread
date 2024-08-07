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
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/staff/home', [StaffController::class, 'index'])->middleware('userAkses:staff')->name('staff.home');
    Route::get('/staff/kec/{id_Kec}/sekolah/{id_thnAjar?}', [StaffController::class, 'daftarSekolah'])->name('staff.daftarSekolah');
    Route::get('/staff/tambah-sekolah', [StaffController::class, 'tambahSekolah'])->middleware('userAkses:staff');
    Route::post('/staff/tambah-sekolah', [StaffController::class, 'createSekolah'])->middleware('userAkses:staff');
    Route::get('/staff/ubah-sekolah/{id_sekolah}', [StaffController::class, 'ubahSekolah'])->middleware('userAkses:staff')->name('staff.ubah_sekolah');
    Route::post('/staff/ubah-sekolah/{id_sekolah}', [StaffController::class, 'updateSekolah'])->middleware('userAkses:staff');
    Route::get('/staff/hapus-sekolah/{id_sekolah}', [StaffController::class, 'hapusSekolah'])->middleware('userAkses:staff')->name('staff.hapus_sekolah');
    Route::get('/staff/profile', [StaffController::class, 'profile'])->middleware('userAkses:staff')->name('staff.profile_akun');
    Route::post('/staff/profile', [StaffController::class, 'updateProfile'])->middleware('userAkses:staff');
    Route::get('/staff/profile_sekolah/{id_sekolah}/{id_tahunajar?}', [StaffController::class, 'profileSekolah'])->middleware('userAkses:staff')->name('staff.profile_sekolah');
    Route::get('/staff/tambah-rekap/{id_sekolah}/{id_tahunajar}', [StaffController::class, 'tambahRekap'])->middleware('userAkses:staff')->name('staff.tambah_rekap');
    Route::post('/staff/tambah-rekap/{id_sekolah}/{id_tahunajar}', [StaffController::class, 'createRekap'])->middleware('userAkses:staff');
    Route::get('/staff/ubah-rekap/{id_rekap}', [StaffController::class, 'ubahRekap'])->middleware('userAkses:staff')->name('staff.ubah_rekap');
    Route::post('/staff/ubah-rekap/{id_rekap}', [StaffController::class, 'updateRekap'])->middleware('userAkses:staff');
    Route::get('/staff/tambah-sarpras/{id_sekolah}/{id_tahunajar}', [StaffController::class, 'tambahSarpras'])->middleware('userAkses:staff')->name('staff.tambah_sarpras');
    Route::post('/staff/tambah-sarpras/{id_sekolah}/{id_tahunajar}', [StaffController::class, 'createSarpras'])->middleware('userAkses:staff');
    Route::get('/staff/ubah-sarpras/{id_sarpras}', [StaffController::class, 'ubahSarpras'])->middleware('userAkses:staff')->name('staff.ubah_sarpras');
    Route::post('/staff/ubah-sarpras/{id_sarpras}', [StaffController::class, 'updateSarpras'])->middleware('userAkses:staff');

    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/admin/home', [AdminController::class, 'index'])->middleware('userAkses:admin')->name('admin.home');
    Route::get('/admin/tambah-akun', [AdminController::class, 'tambahAkun'])->middleware('userAkses:admin')->name('admin.tambahAkun');
    Route::get('/admin/tambah-akun', [AdminController::class, 'tambahAkun'])->middleware('userAkses:admin')->name('admin.tambahAkun');
    Route::get('/admin/kelola_tahunAjar', [AdminController::class, 'tahunAjar'])->middleware('userAkses:admin')->name('admin.kelolaTahun');
    Route::post('/admin/kelola_tahunAjar', [AdminController::class, 'tambahTahun'])->middleware('userAkses:admin')->name('admin.tambahTahun');
    Route::get('/admin/ubah_tahunAjar/{id}', [AdminController::class, 'ubahTahun'])->middleware('userAkses:admin')->name('admin.ubahTahun');
    Route::post('/admin/ubah_tahunAjar/{id}', [AdminController::class, 'updateTahun'])->middleware('userAkses:admin')->name('admin.updateTahun');
    Route::get('/admin/hapus_tahunAjar/{id}', [AdminController::class, 'hapusTahun'])->middleware('userAkses:admin')->name('admin.hapusTahun');
    Route::post('/admin/tambah-akun', [AdminController::class, 'setAkun'])->middleware('userAkses:admin')->name('admin.tambahAkun');
    Route::get('/admin/detail-akun/{id}', [AdminController::class, 'detailAkun'])->middleware('userAkses:admin')->name('admin.detail-akun');
    Route::post('/admin/detail-akun/{id}', [AdminController::class, 'editAkun'])->middleware('userAkses:admin');
    Route::get('/admin/hapus-akun/{id}', [AdminController::class, 'remove'])->middleware('userAkses:admin')->name('admin.hapusAkun');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->middleware('userAkses:admin');

    Route::get('/logout', [SesiController::class, 'logout']);
});

// Route::get('/', function () {
//     return view('welcome');
// });