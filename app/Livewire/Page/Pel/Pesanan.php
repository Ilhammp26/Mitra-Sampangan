<?php

namespace App\Livewire\Page\Pel;

use Livewire\Component;
use App\Models\Booking;
use Livewire\WithPagination;

class Pesanan extends Component
{
    use WithPagination;

    public function render()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        $title['title'] = 'Pesanan - MITRA SAMPANGAN';
        return view('livewire.page.pel.pesanan', compact('bookings'))->layoutData($title);
    }
}
