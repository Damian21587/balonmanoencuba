<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGaleriaImagen extends Component
{
    public $id;
    public $required;
    public $label;
    public $galeryId;
    public $modelo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $required, $label, $galeryId, $modelo = null)
    {
        $this->id = $id;
        $this->required = $required;
        $this->label = $label;
        $this->galeryId = $galeryId;
        $this->modelo = $modelo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        /* $imagenes = null;
             if (isset($this->modelo))
                 $imagenes = $this->modelo->{$this->id} !== null ? $this->modelo->{$this->id} : null;*/

        return view('components.form-galeria-imagen');
    }
}
