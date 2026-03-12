<?php

namespace App\Livewire\Page\Admin\Akun;

use Livewire\Component;

class Wasit extends Component
{
    public function render()
    {
        $title['title'] = 'Akun Wasit - MITRA SAMPANGAN';
        return view('livewire.page.admin.akun.wasit')->layoutData($title);
    }
}
