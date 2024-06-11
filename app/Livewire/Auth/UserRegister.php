<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserRegister extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $image;
    public function render()
    {
        return view('livewire.auth.user-register');
    }
    /**
     *
     */
    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'image' => 'nullable|image|max:4096|mimes:png,jpg,jpeg'
        ]);
        if ($this->image) {
            $ext = $this->image->extension();
            $uuid = uniqid();
            $imageName = $this->email . '_' . now()->timestamp . '_' . $uuid;
            $this->image = $this->image->storeAs('images/users', $imageName . '.' . $ext, 'public');
        }
        $user = User::create(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'image' => $this->image
            ]
        );
        Auth::login($user);
        return redirect('/');
    }
}