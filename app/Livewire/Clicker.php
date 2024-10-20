<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
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

    public UserForm $userForm;

    public function createUser()
    {
        $this->userForm->validate();

        $imageName = uniqid() . '.' . $this->userForm->photo->getClientOriginalExtension();
        if ($this->userForm->photo) {
            $image = $this->userForm->photo->storeAs('user_image', $imageName, 'public');
        }

        User::create([
            'name' => $this->userForm->name,
            'email' => $this->userForm->email,
            'password' => $this->userForm->password,
            'photos' => $imageName,
        ]);

        $this->userForm->reset(['name', 'email', 'password', 'photo']);
        session()->flash('status', 'User Created successfully.');
        $this->dispatch('post-created');
    }

    public function render()
    {
        return view('livewire.clicker');
    }
}
