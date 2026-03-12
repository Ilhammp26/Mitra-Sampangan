<?php

namespace App\Livewire\Page\Booking;

use Livewire\Component;

class Pesan extends Component
{
    public function render()
    {
        $title['title'] = 'Booking - MITRA SAMPANGAN';
        return view('livewire.page.booking.pesan')->layoutData($title);
    }
}
