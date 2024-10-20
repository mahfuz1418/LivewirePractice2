<?php

namespace App\Livewire;

use App\Models\UserList;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $admin = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDirection = 'DESC';

    public function updatedSearch(){
        $this->resetPage();
    }
    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField ) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
        }
        $this->sortBy = $sortByField;
    }

    public function delete($id)
    {
        UserList::findOrFail($id)->delete();
    }

    public function render()
    {
        $users = UserList::search($this->search)
            ->when($this->admin !== '', function ($query) {
                $query->where('is_admin', $this->admin);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.data-table', [
            'users' => $users,
            'admin' => $this->admin
        ]);
    }
}
