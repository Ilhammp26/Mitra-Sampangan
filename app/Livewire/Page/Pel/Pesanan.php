<?php

namespace App\Livewire\Page\Pel;

use Livewire\Component;

class Pesanan extends Component
{
    public function render()
    {
        $title['title'] = 'Pesanan - MITRA SAMPANGAN';
        return view('livewire.page.pel.pesanan')->layoutData($title);
    }
}
