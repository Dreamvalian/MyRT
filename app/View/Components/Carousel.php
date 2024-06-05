<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Carousel extends Component
{
    public $images;

    /**
     * Create a new component instance.
     *
     * @param array $images
     * @return void
     */
    public function __construct($images)
    {
        $this->images = $images;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.carousel');
    }
}