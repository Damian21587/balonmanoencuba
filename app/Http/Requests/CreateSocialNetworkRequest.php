<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SocialNetwork;

class CreateSocialNetworkRequest extends FormRequest
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
            'name' => 'required|unique:social_networks,name',
            'type_social_network' => 'required|unique:social_networks,type_social_network'
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'name'=> 'URL',
            'type_social_network'=> 'Tipo de red social',
        ];
    }
}
