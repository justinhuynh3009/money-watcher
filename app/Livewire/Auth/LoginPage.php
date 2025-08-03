<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mary\Traits\Toast;

class LoginPage extends Component
{
    use Toast;

    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->success('Login successful!');

            return $this->redirectRoute('transactions');
        }

        $this->error('Login failed. Please check your credentials and try again.');
    }

    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
