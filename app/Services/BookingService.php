<?php

namespace App\Services;

use App\Models\Booking;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Notifications\BookingStatusNotification;

class BookingService
{
    /**
     * Check if a specific time slot is available for booking.
     */
    public function checkAvailability($tanggal, $mulai, $selesai)
    {
        return !Booking::where('tanggal', $tanggal)
            ->whereIn('status', [
                OrderStatus::WAITING_PAYMENT->value,
                OrderStatus::WAITING_VERIFICATION->value,
                OrderStatus::PAID->value
            ])
            ->where(function ($q) use ($mulai, $selesai) {
                $q->where(function ($sub) use ($mulai, $selesai) {
                    $sub->where('jam_mulai', '<', $selesai)
                        ->where('jam_selesai', '>', $mulai);
                });
            })
            ->exists();
    }

    /**
     * Create a new booking transaction.
     */
    public function createBooking($userId, $tanggal, $mulai, $selesai, $harga)
    {
        if (!$this->checkAvailability($tanggal, $mulai, $selesai)) {
            throw new \Exception('Maaf, jadwal ini sudah terisi atau sedang dalam proses pembayaran oleh pelanggan lain.');
        }

        return DB::transaction(function () use ($userId, $tanggal, $mulai, $selesai, $harga) {
            $invoiceCode = 'MS-' . date('Ymd', strtotime($tanggal)) . '-' . strtoupper(Str::random(6));

            $booking = Booking::create([
                'user_id'             => $userId,
                'tanggal'             => $tanggal,
                'jam_mulai'           => $mulai,
                'jam_selesai'         => $selesai,
                'harga'               => $harga,
                'jumlah_bayar'        => $harga,
                'invoice_code'        => $invoiceCode,
                'status'              => OrderStatus::WAITING_PAYMENT,
                'payment_expired_at'  => now()->addMinutes(60),
                'payment_retry_count' => 0,
                'payment_proof'       => null,
            ]);

            User::where('role', 'admin')->get()->each(function ($admin) use ($booking) {
                $admin->notify(new BookingStatusNotification(
                    'Pesanan Baru',
                    "Pesanan baru dengan invoice {$booking->invoice_code} menunggu pembayaran."
                ));
            });

            return $booking;
        });
    }

    /**
     * Auto cancel bookings that have expired.
     */
    public function cancelExpiredBookings()
    {
        $expiredBookings = Booking::where('status', OrderStatus::WAITING_PAYMENT->value)
            ->where('payment_expired_at', '<', now())
            ->get();

        foreach ($expiredBookings as $booking) {
            $booking->update(['status' => OrderStatus::EXPIRED]);
        }

        return $expiredBookings->count();
    }
}
