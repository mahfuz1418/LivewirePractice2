<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Clicker extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Validate('required|max:50')]
    public $name = '';

    #[Validate('required|email|unique:users')]
    public $email = '';

    #[Validate('required|min:6')]
    public $password = '';

    #[Validate('image|max:1024')]
    public $photo;

    public function createUser()
    {
        $this->validate();

        $imageName = uniqid() . '.' . $this->photo->getClientOriginalExtension();
        if ($this->photo) {
            $image = $this->photo->storeAs('user_image', $imageName, 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'photos' => $imageName,
        ]);

        $this->reset('name', 'email', 'password', 'photo');
        session()->flash('status', 'User Created successfully.');
        $this->dispatch('post-created');
    }

    public function render()
    {
        return view('livewire.clicker');
    }
}
