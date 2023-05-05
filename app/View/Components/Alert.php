<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     */
    public $title;
    public $message;
    public function __construct($title=null, $message=null)
    {
        //
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
