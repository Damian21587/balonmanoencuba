<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Player;

class CreatePlayerRequest extends FormRequest
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
            'name' => 'required',
            'positions' => 'required',
            'province_id' => 'required',
            'measure' => 'required|numeric',
            'weigth' => 'required|numeric',
            'years_experience' => 'required|integer',
            'image' => 'required|mimes:jpg,png,gif,jpeg|min:1',
            'player_titles_check' => 'sometimes',
            'playerstitles' => 'required_if:player_titles_check,0',
            'about_player_es' => 'required',
            'about_player_en' => 'nullable',

        ];
        return $rules;
    }
    public function attributes()
    {
        return [
            'name' => 'Nombre y apellidos',
            'province_id' => 'Provincia',
            'about_player_es' => 'Descripción',
            'about_player_en' => 'Descripción',
            'positions' => 'Posiciones',
            'measure' => 'Medida',
            'weigth' => 'Peso',
            'years_experience' => 'Años de experiencia',
            'image' => 'Imagen',
            'playerstitles'=>'Título del jugador',
        ];
    }

    public function messages()
    {
        return [
            'numeric' => 'El campo :attribute solo admite números enteros o números decimales separados por punto.',
            'required_if' => 'Al menos debe adicionar un :attribute.',
        ];
    }
}
