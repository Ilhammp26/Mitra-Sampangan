<?php

namespace App\Livewire\Page\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $title['title'] = 'Dashboard - MITRA SAMPANGAN';
        return view('livewire.page.admin.dashboard')->layoutData($title);
    }
}
