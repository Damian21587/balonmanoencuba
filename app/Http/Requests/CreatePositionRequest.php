<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Position;

class CreatePositionRequest extends FormRequest
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

        $rules = [
            'name_es' => 'required|unique:positions,name',
            'name_en' => 'nullable|unique:positions,name',
        ];

        return $rules;

    }

    public function attributes()
    {
        return [
            'name_es'=> 'Nombre',
            'name_en'=> 'Nombre',
        ];
    }
}
