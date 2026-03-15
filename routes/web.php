<?php

use App\Livewire\Page\Landing;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Page\Auth\Login;
use App\Livewire\Page\Auth\Forgot;
use App\Livewire\Page\Pel\Beranda;
use App\Livewire\Page\Admin\Jadwal;
use App\Livewire\Page\Admin\Invoice;
use App\Livewire\Page\Admin\Pesanan;
use App\Livewire\Page\Auth\Register;
use App\Livewire\Page\Admin\Lapangan;
use App\Livewire\Page\Admin\Dashboard;
use App\Livewire\Page\Admin\Akun\Admin;
use App\Livewire\Page\Admin\Akun\Staff;
use App\Livewire\Page\Admin\Akun\Wasit;
use App\Livewire\Page\Admin\Akun\Pelanggan;
use App\Livewire\Page\Booking\Pesan;
use App\Livewire\Page\Pel\Pesanan as PelPesanan;
use App\Livewire\Page\Payment\Upload;

Route::get('/', Landing::class)->name('landing');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/forgotpass', Forgot::class)->name('forgot');

Route::middleware(['auth', 'role:user'])->group(function () {
    // hanya pelanggan yang bisa akses route ini
    Route::get('/pel/beranda', Beranda::class)->name('pel.beranda');
    Route::get('/pel/pesanan', PelPesanan::class)->name('pel.pesanan');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // hanya admin yang bisa akses route ini
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/lapangan', Lapangan::class)->name('admin.lapangan');
    Route::get('/admin/jadwal', Jadwal::class)->name('admin.jadwal');
    Route::get('/admin/pesanan', Pesanan::class)->name('admin.pesanan');
    Route::get('/admin/invoice', Invoice::class)->name('admin.invoice');
    Route::get('/admin/akun/admin', Admin::class)->name('admin.akun.admin');
    Route::get('/admin/akun/staff', Staff::class)->name('admin.akun.staff');
    Route::get('/admin/akun/wasit', Wasit::class)->name('admin.akun.wasit');
    Route::get('/admin/akun/pelanggan', Pelanggan::class)->name('admin.akun.pelanggan');

    Route::get('/admin/payment-preview/{path}', function ($path) {
        $decodedPath = base64_decode($path);
        if (!\Illuminate\Support\Facades\Storage::disk('local')->exists($decodedPath)) {
            abort(404);
        }
        return response()->file(\Illuminate\Support\Facades\Storage::disk('local')->path($decodedPath));
    })->name('admin.payment.preview');
});

Route::middleware(['auth'])->group(function () {
    // Semua role yang sudah login
    Route::get('/booking/pesan', Pesan::class)->name('booking.pesan');
    Route::get('/payment/{invoice_code}', Upload::class)->name('payment.upload');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



