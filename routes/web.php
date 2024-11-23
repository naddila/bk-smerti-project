<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PoinController;
use App\Http\Controllers\BKController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PenangananController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OsisController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PeraturanController;
use App\Models\Osis;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// register, login, logout
Route::get('/', [FrontController::class, 'index']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Input Data Siswa
Route::post('/siswa/store', [StudentController::class, 'store'])->name('siswa');

Route::group(['middleware' => ['auth']], function () {
    // Dashboard sesuai role
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // BK
    Route::group(['middleware' => ['role:1']], function () {
        // Master user
        Route::get('/master-user', [UserAdminController::class, 'daftar_user'])->name('master.user');
        Route::post('/master-user/store', [UserAdminController::class, 'store'])->name('master-user.store');
        Route::get('/master-user/{id}/edit', [UserAdminController::class, 'edit']);
        Route::put('/master-user/{id}', [UserAdminController::class, 'update']);
        Route::post('/master-user/{id}', [UserAdminController::class, 'destroy']);
        // Master guru
        Route::get('/master-guru', [UserAdminController::class, 'daftar_guru']);
        Route::post('/master-guru/store', [UserAdminController::class, 'tambah_guru']);
        Route::post('/master-guru/{id}', [UserAdminController::class, 'hapus_guru']);
        // Master kelas
        Route::get('/master-kelas', [KelasController::class, 'index'])->name('master-kelas.index');
        Route::get('/master-kelas/create', [KelasController::class, 'create'])->name('master-kelas.create');
        Route::post('/master-kelas', [KelasController::class, 'store'])->name('master-kelas.store');
        Route::get('/master-kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('master-kelas.edit');
        Route::put('/master-kelas/{kelas}', [KelasController::class, 'update'])->name('master-kelas.update');
        Route::delete('/master-kelas/{kelas}', [KelasController::class, 'destroy'])->name('master-kelas.destroy');
        // Master siswa
        Route::get('/master-siswa', [BKController::class, 'daftar_siswa']);
        // Tambah Poin
        Route::get('/pelanggaran/tambah/{siswa:nisn}', [PoinController::class, 'tambah_view']);
        Route::put('/pelanggaran/{id}', [PoinController::class, 'tambah_poin']);
        // Route::get('/master-histori', [BKController::class, 'histori_index']);
        // Riwayat Pelanggaran
        Route::get('/histori/{id}', [BKController::class, 'riwayat_siswa']);
        // Penanganan
        Route::get('/penanganan', [PenangananController::class, 'index']);
        Route::post('/penanganan/{id}', [PenangananController::class, 'konfirmasi']);
        // Route::delete('/penanganan/{id}', [PenangananController::class, 'destroy'])->name('penanganan.destroy');

        // Peraturan
        Route::get('master-peraturan', [PeraturanController::class, 'index'])->name('master-peraturan.index');
        Route::get('master-peraturan/create', [PeraturanController::class, 'create'])->name('master-peraturan.create');
        Route::post('master-peraturan', [PeraturanController::class, 'store'])->name('master-peraturan.store');
        Route::get('master-peraturan/{id}/edit', [PeraturanController::class, 'edit'])->name('master-peraturan.edit');
        Route::put('master-peraturan/{id}', [PeraturanController::class, 'update'])->name('master-peraturan.update');
        Route::delete('master-peraturan/{id}', [PeraturanController::class, 'destroy'])->name('master-peraturan.destroy');
        // Edit pass
        Route::get('/bk/edit-pass', [BKController::class, 'view_edit'])->name('bk.view_edit');
        Route::put('/bk/edit-pass/{id}', [BKController::class, 'edit_pass'])->name('bk.edit_pass');
    });

    // pembina osis
    Route::group(['middleware' => ['role:4']], function () {
        // Master siswa
        Route::get('/osis/daftar-siswa', [OsisController::class, 'daftar_siswa']);
        // Tambah Poin
        Route::get('/osis/pelanggaran/tambah/{siswa:nisn}', [OsisController::class, 'osis_tambah_view']);
        Route::put('/osis/pelanggaran/{id}', [OsisController::class, 'osis_tambah_poin']);
        // Riwayat Pelanggaran
        Route::get('/osis/history/{id}', [OsisController::class, 'osis_histori']);
        // Edit pass
        Route::get('/osis/update-pass', [OsisController::class, 'view_edit'])->name('osis.view_edit');
        Route::put('/osis/update-pass/{id}', [OsisController::class, 'ubah_pass'])->name('osis.ubah_pass');
    });

    // Guru
    Route::group(['middleware' => ['role:2']], function () {
        Route::get('/guru/daftar-siswa', [GuruController::class, 'daftar_siswa']);
        Route::get('/guru/ubah-pass', [GuruController::class, 'view_ubah']);
        Route::put('/guru/ubah-pass/{id}', [GuruController::class, 'update_pass']);
        Route::get('/guru/histori', [GuruController::class, 'master_history']);
        Route::get('/guru/histori/{id}', [GuruController::class, 'history_siswa']);
        Route::get('/guru/penanganan', [PenangananController::class, 'guru_index']);
        Route::post('/guru/penanganan/{id}', [PenangananController::class, 'guru_konfirmasi']);
    });

    // Siswa
    Route::group(['middleware' => ['role:3']], function () {
        Route::get('/editsiswa', [StudentController::class, 'show']);
        Route::put('/updatesiswa/{id}', [StudentController::class, 'update']);
        Route::get('/ubah-pass', [StudentController::class, 'view_ubah']);
        Route::put('/ubah-pass/{id}', [StudentController::class, 'update_pass']);
        Route::get('/histori', [StudentController::class, 'history']);
        Route::get('/pesan', [StudentController::class, 'pesan']);
        Route::get('/pesan/{id}', [StudentController::class, 'checkpesan']);
    });
});
