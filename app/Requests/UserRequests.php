<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequests extends FormRequest
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
            'name.required'=>'Preencha um nome',
            'password.required' => 'Preencha uma senha',
            'email'=>'Este email ja existe em nosso sistema',
            'user'=>'Este usuário ja existe em nosso sistema'
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
            'name'=>'required|max:255',
            'password' => 'required',
            'email' => 'required|unique:users|max:255',
            'user' => 'required|unique:users|max:255'
        ];
    }
}
