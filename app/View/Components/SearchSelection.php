<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchSelection extends Component
{
    public $referenceData, $referenceLabel, $referenceRequest, $referenceValue, $referenceName;
    /**
     * Create a new component instance.
     */
    public function __construct($referenceData, $referenceLabel, $referenceRequest, $referenceValue, $referenceName)
    {
        $this->referenceData = $referenceData;
        $this->referenceLabel = $referenceLabel;
        $this->referenceRequest = $referenceRequest;
        $this->referenceValue = $referenceValue;
        $this->referenceName = $referenceName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-selection');
    }
}
