<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Province;

class UpdateProvinceRequest extends FormRequest
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
        $id = $this->route('provincia');
        $rules = [
            'name' => 'required|unique:provinces,name,' . $id,
        ];
        return $rules;
    }

    public function attributes()
    {
        return [
            'name'=> 'Nombre de provincia',
        ];
    }
    /*public function rules()
    {
        $rules = Province::$rules;
        $rules['name'] = $rules['name'].",".$this->route("province");
        return $rules;
    }*/
}
