<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class InterestScreen extends Component
{
    public $user;
    public $avatar;

    public function mount()
    {
        return $this->user = auth()->user()->profile;
    }

    public function render()
    {
        return view('livewire.components.interest-screen');
    }
}
