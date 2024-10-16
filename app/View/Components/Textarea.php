<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Laravel\Sail\Console\PublishCommand;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $id = '',
        public $class = '',
        public $row = '',
        public $name = '',
        public $value = '',
        public $label = '',
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.textarea');
    }
}
