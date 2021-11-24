<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContentCardTab extends Component
{
    public $content1;
    public $content2;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($content1 = null,$content2 = null)
    {
        $this->content1 = $content1;
        $this->content2 = $content2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content-card-tab');
    }
}
