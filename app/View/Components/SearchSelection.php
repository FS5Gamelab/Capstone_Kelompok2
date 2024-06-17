<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchSelection extends Component
{
    public $name, $value, $text, $contents;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $value, $text, $contents)
    {
        $this->name = $name;
        $this->value = $value;
        $this->text = $text;
        $this->contents = $contents;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-selection');
    }
}
