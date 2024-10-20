<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class TestTwo extends Component
{
    #[Title('Test Two Page')]
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.test-two');
    }
}
