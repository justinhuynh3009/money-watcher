<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Profile extends Component
{
    #[Locked]
    public $actions = [
        [
            'name' => 'Change Password',
            'icon' => 'gmdi-sync-lock',
            'action' => 'profile.change-password',
        ],
        [
            'name' => 'Logout',
            'icon' => 'gmdi-logout-r',
            'action' => 'logout',
        ]
    ];

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return $this->redirectRoute('login');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
