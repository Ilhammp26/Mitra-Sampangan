<?php

namespace App\Livewire\Page\Admin\Akun;

use Livewire\Component;

class Staff extends Component
{
    public function render()
    {
        $title['title'] = 'Akun Staff - MITRA SAMPANGAN';
        return view('livewire.page.admin.akun.staff')->layoutData($title);
    }
}
