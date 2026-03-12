<?php

namespace App\Livewire\Page;

use Livewire\Component;

class Landing extends Component
{
    public function render()
    {
        $title['title'] = 'Welcome - MITRA SAMPANGAN';
        return view('livewire.page.landing')->layoutData($title);
    }
}
