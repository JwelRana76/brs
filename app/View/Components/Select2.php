<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select2 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $options,
        public $label = null,
        public $id = null,
        public $key = null,
        public $name = null,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select2');
    }
}
