<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class InterestScreen extends Component
{
    public $user;
    public $categories;

    public function mount()
    {
        $this->user = auth()->user()->load('profile');
        $this->categories = Category::with('skills')->get();
    }

    public function render()
    {
        return view('livewire.components.interest-screen');
    }
}
