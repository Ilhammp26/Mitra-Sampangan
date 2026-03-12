<?php

namespace App\Livewire\Page\Admin;

use Livewire\Component;

class Pesanan extends Component
{
    public function render()
    {
        $title['title'] = 'Pesanan - MITRA SAMPANGAN';
        return view('livewire.page.admin.pesanan')->layoutData($title);
    }
}
