<?php

use App\Livewire\Page\Landing;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Livewire\Page\Profile;
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

use App\Livewire\Page\Admin\Laporan\Transaksi;
use App\Livewire\Page\Admin\Laporan\Pendapatan;

use App\Http\Controllers\InvoiceController;

Route::get('/', Landing::class)->name('landing');
Route::get('/invoice/{invoiceCode}', [InvoiceController::class, 'show'])->name('invoice.show')->middleware('auth');
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
    Route::get('/admin/akun/pelanggan', Pelanggan::class)->name('admin.akun.pelanggan');

    // Laporan
    Route::get('/admin/laporan/transaksi', Transaksi::class)->name('admin.laporan.transaksi');
    Route::get('/admin/laporan/pendapatan', Pendapatan::class)->name('admin.laporan.pendapatan');


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
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/booking/pesan', Pesan::class)->name('booking.pesan');
    Route::get('/payment/{invoice_code}', Upload::class)->name('payment.upload');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/api/calendar/events', function (\Illuminate\Http\Request $request) {
    $start = $request->query('start');
    $end = $request->query('end');

    $query = \App\Models\Booking::with('user')
        ->whereIn('status', [
            \App\Enums\OrderStatus::WAITING_PAYMENT->value,
            \App\Enums\OrderStatus::WAITING_VERIFICATION->value,
            \App\Enums\OrderStatus::PAID->value
        ]);

    if ($start) {
        $query->where('tanggal', '>=', date('Y-m-d', strtotime($start)));
    }
    if ($end) {
        $query->where('tanggal', '<=', date('Y-m-d', strtotime($end)));
    }

    $bookings = $query->get();

    $events = $bookings->map(function ($booking) {
        $startDT = \Carbon\Carbon::parse($booking->tanggal->format('Y-m-d') . ' ' . $booking->jam_mulai);
        $endDT = \Carbon\Carbon::parse($booking->tanggal->format('Y-m-d') . ' ' . $booking->jam_selesai);

        $color = '#28a745'; // Paid = green
        if ($booking->status === \App\Enums\OrderStatus::WAITING_PAYMENT) {
            $color = '#ffc107'; // warning yellow
        } elseif ($booking->status === \App\Enums\OrderStatus::WAITING_VERIFICATION) {
            $color = '#17a2b8'; // info cyan
        }

        $bookerName = 'Hamba Allah';
        $rawName = $booking->user->name ?? 'User Terhapus';

        if (Auth::check() && (Auth::user()->role === 'admin' || Auth::id() === $booking->user_id)) {
            $bookerName = $rawName; // Full name for admin or owner
        } else {
            // Mask the name: "Budi" -> "B***"
            $parts = explode(' ', $rawName);
            $maskedParts = array_map(function ($p) {
                return strlen($p) > 1 ? substr($p, 0, 1) . str_repeat('*', strlen($p) - 1) : $p;
            }, $parts);
            $bookerName = implode(' ', $maskedParts);
        }

        return [
            'title' => $bookerName,
            'start' => $startDT->format('Y-m-d\TH:i:s'),
            'end' => $endDT->format('Y-m-d\TH:i:s'),
            'color' => $color,
            'extendedProps' => [
                'booker_name' => $bookerName,
                'status' => $booking->status->label()
            ]
        ];
    });

    return response()->json($events);
})->name('api.calendar.events');
