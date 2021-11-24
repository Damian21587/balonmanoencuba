<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SocialNetwork;

class UpdateSocialNetworkRequest extends FormRequest
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
        $id = $this->route("redes_sociale");
        $rules = [
            'name' => 'required|unique:social_networks,name,' . $id,
            'type_social_network' => 'required|unique:social_networks,type_social_network,' . $id
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'URL',
            'type_social_network' => 'Tipo de red social',
        ];
    }
}
