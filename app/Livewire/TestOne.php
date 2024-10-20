<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class TestOne extends Component
{
    #[Title('Test One Page')]
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.test-one');
    }
}
