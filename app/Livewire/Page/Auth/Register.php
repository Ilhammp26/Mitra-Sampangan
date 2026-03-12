<?php

namespace App\Livewire\Page\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $email;
    public $no_wa;
    public $password;
    public $role;
    public $password_confirmation;
    public $showPassword = false;

    public function render()
    {
        $title['title'] = 'Register - MITRA SAMPANGAN';
        return view('livewire.page.auth.register')->layoutData($title);
    }

    public function register(){
        $this->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'no_wa' => [
                        'required',
                        'digits_between:10,15',
                        'regex:/^(08|628)[0-9]+$/'],
            'password' => 'required|string|min:8|confirmed'
        ],[
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.string' => 'Nama lengkap harus berupa teks.',
            'name.min' => 'Nama lengkap minimal 3 karakter.',
            'name.max' => 'Nama lengkap maksimal 100 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_wa.required' => 'No. WhatsApp wajib diisi.',
            'no_wa.numeric' => 'No. WhatsApp harus berupa angka.',
            'no_wa.regex' => 'Nomor WhatsApp harus diawali 08 dan angka saja',
            'no_wa.digits_between' => 'Nomor WA harus 10–15 digit',
            'no_wa.min' => 'No. WhatsApp minimal 10 digit.',
            'no_wa.max' => 'No. WhatsApp maksimal 20 digit.',
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.'
        ]);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'no_wa' => $this->no_wa,
            'password' => Hash::make($this->password),
            'role' => 'user'
        ]);
        Auth::login($user);
        session()->flash('register_success', 'Register berhasil! Silakan login.');
        return redirect()->route('login');
    }

    public function togglePassword(){
        $this->showPassword = !$this->showPassword;
    }
}
