<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo as ModelsTodo;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Validate('required|max:20')]
    public $name = '';

    public $search;

    #[Validate('required|max:20')]
    public $editTodoName = '';

    public $editTodoId = '';



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

    public function placeholder()
    {
        return view('lazy');
    }

    #[On('todo-created')]
    public function render()
    {
        // sleep(1);
        $todos = ModelsTodo::where('name', 'like', "%{$this->search}%")->latest()->paginate(5);
        return view('livewire.todo-list', [
            'todos' => $todos,
        ]);
    }
}
