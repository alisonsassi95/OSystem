<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderServiceRequest extends FormRequest
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
            'problem.required'=>'Preencha o nome do equipamento',

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
            'problem'=>'required|max:255',
        ];
    }
}
