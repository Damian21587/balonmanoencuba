<?php

namespace App\Http\Requests;

use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewRequest extends FormRequest
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
        $id = $this->route("noticia");
        $rules = [
            'title_es' => 'required|unique:news,title,'.'es' . $id,
            'title_en' => 'nullable|unique:news,title,'.'en' . $id,
            'image' => 'nullable|mimes:jpg,png,gif,jpeg|min:1',
            'publication_date' => 'required|date',
            'description_es' => 'required',
            'description_en' => 'nullable'

        ];
        return $rules;
    }

    public function attributes()
    {
        return [
            'image' => 'Imagen',
            'publication_date' => 'Fecha de publicación',
            'title_es' => 'Título',
            'title_en' => 'Título',
            'description_es' => 'Descripción',
            'description_en' => 'Descripción',
        ];
    }
}
