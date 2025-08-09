<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.auth')]
class RegisterPage extends Component
{
    use Toast;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            DB::transaction(function () {
                User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                ]);
            });

            $this->success('Registration successful!');

            return $this->redirectRoute('login', navigate: true);
        } catch (\Exception $e) {
            info("Registration failed: {$e->getMessage()}");

            $this->error('Registration failed. Please try again.' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
