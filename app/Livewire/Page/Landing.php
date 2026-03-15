<?php

namespace App\Livewire\Page;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Landing extends Component
{
    public function mount()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('pel.beranda');
            }
        }
    }

    public function render()
    {
        $title['title'] = 'Welcome - MITRA SAMPANGAN';
        return view('livewire.page.landing')->layoutData($title);
    }
}
