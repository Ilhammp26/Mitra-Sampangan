<?php

namespace App\Livewire\Page\Admin;

use Livewire\Component;

class Jadwal extends Component
{
    public function render()
    {
        $title['title'] = 'Jadwal - MITRA SAMPANGAN';
        return view('livewire.page.admin.jadwal')->layoutData($title);
    }
}
