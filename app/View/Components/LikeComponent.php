<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LikeComponent extends Component
{
    public $recurso;
    public function __construct($recurso)
    {
        $this->recurso = $recurso;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.like-component');
    }
}
