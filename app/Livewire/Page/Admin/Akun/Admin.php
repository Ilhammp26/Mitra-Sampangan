<?php

namespace App\Livewire\Page\Admin\Akun;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Admin extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $title['title'] = 'Akun Admin - MITRA SAMPANGAN';
        $users = User::where('role', 'admin')
                ->latest()
                ->paginate(10);
        return view('livewire.page.admin.akun.admin', ['users' => $users])->layoutData($title);
    }
}
