<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NewInput extends Component
{
    public $place;
    public function __construct($place = null)
    {
        $this->place = $place;
    }

    public function render()
    {
        return view('components.new-input');
    }
}
