<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentRequest extends FormRequest
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
            'name.required'=>'Preencha o nome do equipamento',
            'serialnumber.required'=>'Preencha o número de série do equipamento',
            'serialnumber.unique'=>'Este número de série ja existe'

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
            'serialnumber' => 'required|unique:equipaments|max:255'
            
        ];
    }
}
