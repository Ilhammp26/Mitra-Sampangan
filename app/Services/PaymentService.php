<?php

namespace App\Services;

use App\Models\Booking;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\Storage;

class PaymentService
{
    /**
     * Upload payment proof and transition status
     */
    public function uploadProof(Booking $booking, $file)
    {
        if ($booking->status !== OrderStatus::WAITING_PAYMENT) {
            throw new \Exception('Pesanan ini tidak dapat menerima pembayaran saat ini.');
        }

        if ($booking->payment_expired_at && now()->isAfter($booking->payment_expired_at)) {
            $booking->update(['status' => OrderStatus::EXPIRED]);
            throw new \Exception('Waktu pembayaran telah habis. Pesanan dibatalkan otomatis.');
        }

        // Store file in private disk: `storage/app/private/payments`
        // Ensure you have configured 'private' disk in filesystems.php if needed, or just use local disk
        $path = $file->store('payments', 'local'); 

        $booking->update([
            'payment_proof' => $path,
            'status' => OrderStatus::WAITING_VERIFICATION,
        ]);

        return $booking;
    }

    /**
     * Admin Approve
     */
    public function approvePayment(Booking $booking)
    {
        $booking->update([
            'status' => OrderStatus::PAID,
        ]);
        
        return $booking;
    }

    /**
     * Admin Reject (with logic for MAXIMUM 1 retry)
     */
    public function rejectPayment(Booking $booking)
    {
        // Delete old proof to save space
        if ($booking->payment_proof) {
            Storage::disk('local')->delete($booking->payment_proof);
        }

        $newRetryCount = $booking->payment_retry_count + 1;

        if ($newRetryCount > 1) {
            // Maximum retry exceeded
            $booking->update([
                'status' => OrderStatus::CANCELLED,
                'payment_proof' => null,
                'payment_retry_count' => $newRetryCount,
            ]);
        } else {
            // Allow 1 retry, reset to WAITING_PAYMENT
            // As decided in plan, maybe give them an extra 60 mins to fix
            $booking->update([
                'status' => OrderStatus::WAITING_PAYMENT,
                'payment_proof' => null,
                'payment_retry_count' => $newRetryCount,
                'payment_expired_at' => now()->addMinutes(60),
            ]);
        }

        return $booking;
    }
}
