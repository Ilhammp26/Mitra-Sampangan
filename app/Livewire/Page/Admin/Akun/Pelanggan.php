<?php

namespace App\Livewire\Page\Admin\Akun;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Pelanggan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $title['title'] = 'Akun Pelanggan - MITRA SAMPANGAN';
        $users = User::where('role', 'user')
                ->latest()
                ->paginate(10);
        return view('livewire.page.admin.akun.pelanggan',['users' => $users])->layoutData($title);
    }

    
}
