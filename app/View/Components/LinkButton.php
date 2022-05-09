<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LinkButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $to;
    public $type;
    public $text;

    public function __construct($to, $text, $type)
    {
        $this->to = $to;
        $this->text = $text;
        $this->type = $type;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.link-button');
    }
}
