<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;
    
    #[Validate('required|max:50')]
    public $name = '';

    #[Validate('required|email|unique:users')]
    public $email = '';

    #[Validate('required|min:6')]
    public $password = '';

    public function createUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        $this->reset(['name', 'email', 'password']);
        session()->flash('status', 'User Created successfully.');
    }

    public function render()
    {
        $user_data = User::paginate('5');
        return view('livewire.clicker', [
            'user_data' => $user_data,
        ]);
    }
}
