<?php

namespace App\Livewire\Page\Auth;

use Livewire\Component;

class Forgot extends Component
{
    public function render()
    {
        $title['title'] = 'Reset Password - MITRA SAMPANGAN';
        return view('livewire.page.auth.forgot')->layoutData($title);
    }
}
