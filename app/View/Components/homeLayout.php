<?php

namespace App\View\Components;

use Illuminate\View\Component;

class homeLayout extends Component
{

    public $title, $wirecss, $wirescript;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $wirecss = null, $wirescript = null)
    {
        $this->title = $title;
        $this->wirecss = $wirecss;
        $this->wirescript = $wirescript;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home-layout');
    }
}
