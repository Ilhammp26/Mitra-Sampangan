<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public static function isConflict($lapanganId, $tanggal, $mulai, $selesai){
        return self::where('lapangan_id', $lapanganId)
            ->where('tanggal', $tanggal)
            ->whereIn('status', ['pending','dp','paid'])
            ->where(function ($q) use ($mulai, $selesai) {
                $q->whereBetween('jam_mulai', [$mulai, $selesai])
                ->orWhereBetween('jam_selesai', [$mulai, $selesai])
                ->orWhere(function ($qq) use ($mulai, $selesai) {
                    $qq->where('jam_mulai','<=',$mulai)->where('jam_selesai','>=',$selesai);
                });
            })
            ->exists();
    }
}
