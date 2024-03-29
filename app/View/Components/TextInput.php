<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{

    public function __construct(
        public ?string $name  = null,     
        public ?string $value = null, 
        public ?string $placeholder = null,
        public string $type
    )
    {
     
    }
    public function render(): View|Closure|string
    {
        return view('components.text-input');
    }
}
