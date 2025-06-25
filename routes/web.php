<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;

// Route::get('/', function () {
//     return view('fe.master');
// });

// Frontend
Route::resource('/', App\Http\Controllers\HomeController::class);
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::resource('/contact', App\Http\Controllers\ContactController::class);
Route::get('/packages', [PackagesController::class, 'index'])->name('packages.index');
Route::resource('/packages', App\Http\Controllers\PackagesController::class);
Route::resource('/gallery', App\Http\Controllers\GalleryController::class);
Route::resource('/news', App\Http\Controllers\NewsController::class);
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::resource('/news-detail', App\Http\Controllers\NewsDetailController::class);
Route::resource('/tour-detail', App\Http\Controllers\TourDetailController::class);

// Backend
Route::resource('/dashboard', App\Http\Controllers\DashboardController::class);
Route::resource('/register', App\Http\Controllers\RegisterController::class);
Route::resource('/reset', App\Http\Controllers\ResetPasswordController::class);


Route::resource('/settings', App\Http\Controllers\PengaturanController::class);


// Middleware untuk login (BE)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/admin', App\Http\Controllers\AdminController::class);
    Route::resource('/berita', App\Http\Controllers\BeritaController::class);
    Route::resource('/data_karyawan', App\Http\Controllers\DataKaryawanController::class);
    Route::resource('/user', App\Http\Controllers\UserController::class);
    Route::resource('/data_pelanggan', App\Http\Controllers\DataPelangganController::class);
    Route::resource('/kategori_berita', App\Http\Controllers\KategoriBeritaController::class)->parameters(['kategori_berita' => 'kategoriBerita']);
}); 
Route::middleware(['auth', 'bendahara'])->group(function () {
    Route::resource('/bendahara', App\Http\Controllers\BendaharaController::class);
    Route::resource('/obyek_wisata', App\Http\Controllers\ObyekWisataController::class);
    Route::resource('/penginapan', App\Http\Controllers\PenginapanController::class);
    Route::resource('/reservasi', App\Http\Controllers\ReservasiController::class);
    Route::get('/reservasi/{id}/download', [ReservasiController::class, 'downloadPdf'])->name('reservasi.download');
    Route::resource('/paket_wisata', App\Http\Controllers\PaketWisataController::class);
    Route::resource('/kategori_wisata', App\Http\Controllers\KategoriWisataController::class)->parameters(['kategori_wisata' => 'kategoriWisata']);
    Route::resource('/diskon', App\Http\Controllers\DiskonController::class);
    Route::resource('/metode_pembayaran', App\Http\Controllers\MetodePembayaranController::class);
});
Route::middleware(['auth','pelanggan'])->group(function () {
    Route::resource('/pelanggan', App\Http\Controllers\PelangganController::class);
});
Route::middleware(['auth','owner'])->group(function () {
    Route::resource('/owner', App\Http\Controllers\OwnerController::class);
    Route::resource('/admin', App\Http\Controllers\AdminController::class);
    Route::resource('/berita', App\Http\Controllers\BeritaController::class);
    Route::resource('/data_karyawan', App\Http\Controllers\DataKaryawanController::class);
    Route::resource('/user', App\Http\Controllers\UserController::class);
    Route::resource('/data_pelanggan', App\Http\Controllers\DataPelangganController::class);
    Route::resource('/kategori_berita', App\Http\Controllers\KategoriBeritaController::class)->parameters(['kategori_berita' => 'kategoriBerita']);
    Route::resource('/bendahara', App\Http\Controllers\BendaharaController::class);
    Route::resource('/obyek_wisata', App\Http\Controllers\ObyekWisataController::class);
    Route::resource('/penginapan', App\Http\Controllers\PenginapanController::class);
    Route::resource('/reservasi', App\Http\Controllers\ReservasiController::class);
    Route::get('/reservasi/{id}/download', [ReservasiController::class, 'downloadPdf'])->name('reservasi.download');
    Route::resource('/paket_wisata', App\Http\Controllers\PaketWisataController::class);
    Route::resource('/kategori_wisata', App\Http\Controllers\KategoriWisataController::class)->parameters(['kategori_wisata' => 'kategoriWisata']);
    Route::resource('/diskon', App\Http\Controllers\DiskonController::class);
    Route::resource('/metode_pembayaran', App\Http\Controllers\MetodePembayaranController::class);
    // Route::match(['GET', 'POST'], '/owner/laporan', [OwnerController::class, 'laporan'])->name('owner.laporan');
    Route::get('/owner/laporan/export', [OwnerController::class, 'export'])->name('owner.laporan.export');
    Route::get('/owner/laporan/exportPdf', [OwnerController::class, 'exportPdf'])->name('owner.laporan.exportPdf');
});

// Rute masuk untuk admin (BE)
Route::get('/masuk', [AuthController::class, 'masuk'])->name('masuk');
Route::post('/masuk', [AuthController::class, 'submitMasuk'])->name('masuk.submit');

// Rute Register untuk pelanggan (FE)
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('masuk'); // Redirect ke halaman login
})->name('logout');

// Rute untuk pelanggan (FE)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth_fe.login');
Route::post('/login', [LoginController::class, 'login'])->name('auth_fe.login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth_fe.logout');

Route::get('/home', function () {
        $pelanggan = App\Models\Pelanggan::where('id_user', Auth::guard('pelanggan')->id())->first();
        return view('home.index', ['pelanggan' => $pelanggan, 'title' => 'Home']);
    })->name('home.index');

Route::middleware('pelanggan')->group(function () {
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/success/{ids}', [BookingController::class, 'success'])->name('booking.success');
    Route::get('/booking/form', [BookingController::class, 'create'])->name('booking.form');
    Route::get('/booking/{id}/pdf', [BookingController::class, 'generatePdf'])->name('booking.pdf');
});