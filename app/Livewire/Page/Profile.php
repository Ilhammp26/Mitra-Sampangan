<?php

namespace App\Livewire\Page;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class Profile extends Component
{
    public $name;
    public $email;
    public $no_wa;
    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->no_wa = $user->no_wa;
    }

    public function updateProfile()
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required|string|max:255',
            'no_wa' => 'nullable|string|max:20',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ];

        if (!empty($this->password)) {
            $rules['current_password'] = 'required';
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $this->validate($rules);

        if (!empty($this->password)) {
            if (!Hash::check($this->current_password, $user->password)) {
                $this->addError('current_password', 'Password saat ini salah.');
                return;
            }
            $user->password = Hash::make($this->password);
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->no_wa = $this->no_wa;

        $user->save();

        session()->flash('success', 'Profil berhasil diperbarui.');

        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        $title['title'] = 'Profile - MITRA SAMPANGAN';
        return view('livewire.page.profile')->layoutData($title);
    }
}
