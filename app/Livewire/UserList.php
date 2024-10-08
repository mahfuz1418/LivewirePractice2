<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class UserList extends Component
{

    #[On('post-created')]
    public function render()
    {
        $user_data = User::latest()->paginate('5');
        return view('livewire.user-list', [
            'user_data' => $user_data,
        ]);
    }
}
