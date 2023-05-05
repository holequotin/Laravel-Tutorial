<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $name;
    public $type;

    public function __construct($name = null, $type = null)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.button');
    }
}
