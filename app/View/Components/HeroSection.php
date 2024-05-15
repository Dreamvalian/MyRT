<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HeroSection extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.hero-section');
    }
}
