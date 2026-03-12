<?php

namespace App\Livewire\Page\Admin;

use Livewire\Component;

class Invoice extends Component
{
    public function render()
    {
        $title['title'] = 'Invoice - MITRA SAMPANGAN';
        return view('livewire.page.admin.invoice')->layoutData($title);
    }
}
