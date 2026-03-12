<?php

namespace App\Livewire\Page\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password, $showPassword = false;

    public function render()
    {
        $title['title'] = 'Login - MITRA SAMPANGAN';
        return view('livewire.page.auth.login')->layoutData($title);
    }

    public function login(){
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('pel.beranda');
        }
        session()->flash('error', 'Email atau password salah.');
    }

    public function togglePassword(){
        $this->showPassword = !$this->showPassword;
    }

}
