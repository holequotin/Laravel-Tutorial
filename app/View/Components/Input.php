<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public function __construct($name = null,$type = null)
    {
        //
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
