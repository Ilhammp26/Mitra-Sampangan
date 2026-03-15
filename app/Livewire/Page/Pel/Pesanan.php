<?php

namespace App\Livewire\Page\Pel;

use Livewire\Component;
use App\Models\Booking;
use Livewire\WithPagination;

class Pesanan extends Component
{
    use WithPagination;

    public function cancelBooking(Booking $booking)
    {
        // Ensure user owns this and it is still waiting for payment
        if ($booking->user_id !== auth()->id() || $booking->status !== \App\Enums\OrderStatus::WAITING_PAYMENT) {
            session()->flash('error', 'Pesanan ini tidak dapat dibatalkan.');
            return;
        }

        $booking->update(['status' => \App\Enums\OrderStatus::CANCELLED->value]);
        session()->flash('success', 'Pesanan berhasil dibatalkan.');
    }

    public function render()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        $title['title'] = 'Pesanan - MITRA SAMPANGAN';
        return view('livewire.page.pel.pesanan', compact('bookings'))->layoutData($title);
    }
}
