<?php

namespace App\Enums;

enum OrderStatus: string
{
    case WAITING_PAYMENT = 'waiting_payment';
    case WAITING_VERIFICATION = 'waiting_verification';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';
    case EXPIRED = 'expired';

    public function label(): string
    {
        return match($this) {
            self::WAITING_PAYMENT => 'Menunggu Pembayaran',
            self::WAITING_VERIFICATION => 'Menunggu Verifikasi',
            self::PAID => 'Telah Dibayar',
            self::CANCELLED => 'Dibatalkan',
            self::EXPIRED => 'Kedaluwarsa',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::WAITING_PAYMENT => 'warning',
            self::WAITING_VERIFICATION => 'info',
            self::PAID => 'success',
            self::CANCELLED => 'danger',
            self::EXPIRED => 'secondary',
        };
    }
}
