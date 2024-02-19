<?php

use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartementController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoomMettingController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Pegawai\BookingController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;
use App\Http\Controllers\Pegawai\ProfileController as PegawaiProfileController;
use App\Http\Controllers\Pegawai\RoomsMettingController;
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



Route::get('/', [LoginController::class, 'index'])->name('/');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/proses', [LoginController::class, 'login'])->name('login.proses');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


// akses admin
Route::middleware(['CheckLogin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');

    Route::get('/admin/profile', [ProfileController::class, 'index'])->name('profile.admin');
    Route::get('/admin/profile/setting', [ProfileController::class, 'setting'])->name('profile.admin.setting');
    Route::put('/admin/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.admin.update');

    // api datatable
    Route::get('getAllDepartement', [DepartementController::class, 'getAllDepartement'])->name('getAllDepartement');
    Route::get('/admin/bookinglist', [AdminBookingController::class, 'bookinglist'])->name('admin.bookinglist');
    Route::get('/admin/approved/{id_booking}', [AdminBookingController::class, 'approved'])->name('admin.approved');
    Route::get('/admin/rejected/{id_booking}', [AdminBookingController::class, 'rejected'])->name('admin.rejected');
    Route::post('/admin/searchDate', [AdminBookingController::class, 'searchDate'])->name('admin.searchDate');
    Route::get('/admin/report_pdf/{start_date_time}/{end_date_time}', [AdminBookingController::class, 'report_pdf'])->name('admin.report_pdf');
    // Route group
    Route::resources([
        '/admin/departments' => DepartementController::class,
        '/admin/rooms' => RoomMettingController::class,
        '/admin/users' => UsersController::class,
    ]);
});


// akses pegawai
Route::middleware(['CheckLoginPegawai'])->group(function () {
    Route::get('/pegawai/dashboard', [PegawaiDashboardController::class, 'index'])->name('dashboard.pegawai');
    Route::get('/pegawai/roommetting', [RoomsMettingController::class, 'index'])->name('pegawai.roommetting');
    Route::post('/pegawai/booking', [BookingController::class, 'booking'])->name('pegawai.booking');
    Route::get('/pegawai/bookinglist', [BookingController::class, 'bookinglist'])->name('pegawai.bookinglist');
    Route::get('/pegawai/profile', [PegawaiProfileController::class, 'index'])->name('profile.pegawai');
    Route::get('/pegawai/profile/setting', [PegawaiProfileController::class, 'setting'])->name('profile.pegawai.setting');
    Route::put('/pegawai/profile/update/{id}', [PegawaiProfileController::class, 'update'])->name('profile.pegawai.update');
});