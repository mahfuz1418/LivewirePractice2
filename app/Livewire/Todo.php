<?php

namespace App\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    use WithPagination;

    #[Validate('required|max:20')]
    public $name = '';

    public $search;

    #[Validate('required|max:20')]
    public $editTodoName = '';

    public $editTodoId = '';

    public function create()
    {
        $this->validateOnly('name');
        ModelsTodo::create([
            'name' => $this->name,
        ]);
        $this->reset('name');
        session()->flash('success', 'Todo added');

        $this->resetPage();

    }

    public function delete($todoId)
    {
        try {
            ModelsTodo::findOrFail($todoId)->delete();
            session()->flash('deleted', 'Todo deleted successfully');
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to Delete Todo');

        }

    }

    public function toggle($todoId)
    {
        $todo = ModelsTodo::find($todoId);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit($todoId)
    {
        $this->editTodoId = $todoId;
        $this->editTodoName = ModelsTodo::find($todoId)->name;
    }

    public function update()
    {
        $this->validateOnly('editTodoName');
        ModelsTodo::find($this->editTodoId)->update([
            'name' => $this->editTodoName,
        ]);

        $this->cancel();
    }

    public function cancel()
    {
        $this->reset('editTodoName', 'editTodoId');
    }

    public function render()
    {
        $todos = ModelsTodo::where('name', 'like', "%{$this->search}%")->latest()->paginate(5);
        return view('livewire.todo', [
            'todos' => $todos,
        ]);
    }
}
