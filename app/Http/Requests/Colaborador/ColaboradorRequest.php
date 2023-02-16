<?php

namespace App\Http\Requests\Colaborador;

use Illuminate\Foundation\Http\FormRequest;

class ColaboradorRequest extends FormRequest
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
        $rule = [
            'user_id'            => 'required',
            'registro'           => 'nullable',
            'cargo_id'           => 'required',
            'salario'            => 'nullable',
            'forma_contratacao'  => 'nullable',
        ];

        return $rule;
    }



    public function attributes()
    {
        return [
            'user_id'            => 'colaborador',
            'cargo_id'           => 'cargo',
            'forma_contratacao'  => 'forma de contratação'
        ];
    }



    public function messages()
    {
        return [
            'required' => 'Informar o :attribute',
        ];
    }
}
