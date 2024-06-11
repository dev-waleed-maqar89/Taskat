<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserLogin extends Component
{
    public $email;
    public $password;
    public $remember = false;
    public function render()
    {
        return view('livewire.auth.user-login');
    }
    public function login()
    {
        $attempt = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->remember);
        $user = User::where('email', $this->email)->first();
        if ($attempt && $user) {
            Auth::login($user);
            return redirect('/');
        } else {
            $this->addError('email', 'Email or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}