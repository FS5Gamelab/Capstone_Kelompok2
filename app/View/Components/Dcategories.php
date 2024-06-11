<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dcategories extends Component
{
    public $url, $img, $alt, $desc;
    /**
     * Create a new component instance.
     */
    public function __construct($href, $src, $alt, $description)
    {
        $this->url = $href;
        $this->img = $src;
        $this->alt = $alt;
        $this->desc = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dcategories');
    }
}
