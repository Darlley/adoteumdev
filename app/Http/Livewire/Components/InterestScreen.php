<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class InterestScreen extends Component
{
    public $user; 
    public $avatar;
    public $categories;

    public function mount()
    {
        $this->user = auth()->user()->load('profile');
        $this->categories = Category::with('skills')->get();
        $this->avatar = $this->user->profile->avatar;
    }

    public function render()
    {
        return view('livewire.components.interest-screen');
    }
}
