<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormComboboxDuallistbox extends Component
{
    public $id;
    public $required;
    public $datos;
    public $modelo;
    public $label;
    public $textlocale;
    public $multiple;
    public $textnew;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $required, $datos, $label, $modelo = null, $multiple = null, $textlocale = null, $textnew = null)
    {
        $this->id = $id;
        $this->required = $required;
        $this->datos = $datos;
        $this->modelo = $modelo;
        $this->label = $label;
        $this->textlocale = $textlocale;
        $this->multiple = $multiple;
        $this->textnew = $textnew;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-combobox-duallistbox');
    }
}
