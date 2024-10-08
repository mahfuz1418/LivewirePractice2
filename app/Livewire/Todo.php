<?php

namespace App\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    #[Validate('required|max:20')]
    public $name = '';

    public function create()
    {
        $this->validateOnly('name');
        ModelsTodo::create([
            'name' => $this->name,
        ]);
        $this->reset('name');
        session()->flash('success', 'Todo added');

        $this->dispatch('todo-created');
    }

    public function render()
    {
        return view('livewire.todo');
    }
}
