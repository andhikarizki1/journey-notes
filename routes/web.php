<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PdfController;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

// Login User
Route::get('login', [LoginController::class, 'showLoginForm'])->name('show.user');
Route::post('login', [LoginController::class, 'loginUser'])->name('login.user');

// Register User
Route::get('register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('register', [RegisterController::class, 'create'])->name('register.create');

Route::prefix('user')->middleware('roles:user')->group(function () {
    // Dashboard
    Route::get('dashboard', [HomeController::class, 'index'])->name('user.dash');
    Route::get('dashboard/ajax', [HomeController::class, 'ajaxuser'])->name('user.ajax');
    Route::post('dashboard/tambah', [HomeController::class, 'store'])->name('user.tambah');

    // Profil
    Route::get('dashboard/profil/{id}', [ProfilController::class, 'show'])->name('profil');
    Route::put('dashboard/profil/{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::put('dashboard/profil/password/{id}', [ProfilController::class, 'editpass'])->name('pass.update');
    Route::put('dashboard/profil/email/{id}', [ProfilController::class, 'editemail'])->name('email.update');

    // Export
    Route::get('dashboard/export/excel', [ExcelController::class, 'excelCatatanAll'])->name('exexcel');
    Route::get('dashboard/export/excel/{id}', [ExcelController::class, 'excelCatatan'])->name('exexcel.id');

    Route::get('dashboard/export/pdf', [PdfController::class, 'pdfCatatanAll'])->name('expdf');
    Route::get('dashboard/export/pdf/{id}', [PdfController::class, 'pdfCatatan'])->name('expdf.id');
    
    Route::get('dashboard/profil/hapus/{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');
});
