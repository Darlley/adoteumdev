<?php

use App\Http\Livewire\Components\SplashScreen;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;


it('checks if has home page is working')->get('/')->assertOk();
it('checks if has SplashScreen component in livewire', function(){
    $this->get('/')->assertSeeLivewire('components.splash-screen');
});