<?php

namespace App\Livewire\Page\Pel;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $title['title'] = 'Beranda - MITRA SAMPANGAN';
        return view('livewire.page.pel.dashboard')->layoutData($title);
    }
}
