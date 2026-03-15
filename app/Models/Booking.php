<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'harga',
        'tipe_pembayaran',
        'jumlah_bayar',
        'invoice_code',
        'status',
        'payment_proof',
        'payment_expired_at',
        'payment_retry_count',
    ];

    protected $casts = [
        'status' => \App\Enums\OrderStatus::class,
        'payment_expired_at' => 'datetime',
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
