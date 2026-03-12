<?php

namespace App\Livewire\Page\Admin;

use Livewire\Component;

class Lapangan extends Component
{
    public function render()
    {
        $title['title'] = 'Lapangan - MITRA SAMPANGAN';
        return view('livewire.page.admin.lapangan')->layoutData($title);
    }
}
