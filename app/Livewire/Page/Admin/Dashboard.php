<?php

namespace App\Livewire\Page\Admin;

use Livewire\Component;
use App\Models\Booking;
use App\Enums\OrderStatus;

class Dashboard extends Component
{
    public function render()
    {
        $totalBerhasil = Booking::where('status', OrderStatus::PAID->value)->count();
        $totalGagal = Booking::whereIn('status', [OrderStatus::CANCELLED->value, OrderStatus::EXPIRED->value])->count();
        $totalBooking = Booking::count();
        $pendapatanTotal = Booking::where('status', OrderStatus::PAID->value)->sum('jumlah_bayar');
        
        $recentBookings = Booking::with(['user'])->latest()->take(5)->get();

        $title['title'] = 'Dashboard - MITRA SAMPANGAN';
        return view('livewire.page.admin.dashboard', compact(
            'totalBerhasil',
            'totalGagal',
            'totalBooking',
            'pendapatanTotal',
            'recentBookings'
        ))->layoutData($title);
    }
}
