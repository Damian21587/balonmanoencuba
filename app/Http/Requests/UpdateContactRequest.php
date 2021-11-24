<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contact;

class UpdateContactRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route("contacto");
        $rules = [
            'telephone' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'address_es' => 'required',
            'address_en' => 'nullable'
        ];
        return $rules;
    }

    public function attributes()
    {
        return [
            'telephone'=> 'teléfono',
            'email'=> 'Correo electrónico',
            'address_es'=> 'Dirección',
            'address_en'=> 'Dirección',
        ];
    }
}
