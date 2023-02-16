<?php

namespace App\Http\Requests\Endereco;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
        return [
            'cep'             => 'required',
            'logradouro'      => 'required',
            'numero'          => 'required',
            'bairro'          => 'required',
            'municipio'       => 'required',
            'estado'          => 'required',
        ];

        // return $rule;
    }

    public function messages()
    {
        return [
            'cep.required'              => 'Informar o CEP da residência',
            'logradouro.required'       => 'O endereço é obrigatório',
            'numero.required'           => 'O número da residência é obrigatório',
            'bairro.required'           => 'Informar o bairro',
            'municipio.required'        => 'Informar a cidade',
            'estado.required'           => 'Infomar o estado',
        ];
    }
}
