<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormDatefield extends Component
{
    public $id;
    public $required;
    public $modelo;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $required, $modelo = null, $label)
    {
        $this->id = $id;
        $this->required = $required;
        $this->modelo = $modelo;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-datefield');
    }
}
