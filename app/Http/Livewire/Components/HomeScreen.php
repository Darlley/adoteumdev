<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class HomeScreen extends Component
{
    
    public function render()
    {
        return view('livewire.components.home-screen');
    }

    public function loginAsGithub()
    {
        return redirect()->route('socialite.redirect-github');
    }
    
    public function loginAsGoogle()
    {
        return redirect()->route('socialite.redirect-google');
    }
}
