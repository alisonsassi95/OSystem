<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    public function messages(){

        return[
            'email.unique'=>'Este e-mail ja existe em nosso sistema',
            'password.required'=>'O Campo senha é Obrigatório',
            'password.max'=>'A senha é muito extensa',
            'password.min'=>'A senha é muito curta'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:14|min:8',
        ];
    }
}
