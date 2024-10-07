<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavigationMenu extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
        if ($this->user->hasRole('teacher')) {
            $this->user->load('teacher');
        }
    }

    public function render()
    {
        return view('livewire.components.navigation-menu');
    }
}
