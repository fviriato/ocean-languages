<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EnderecoStoreUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {

        $request['cep'] = str_replace(['.', '-'], '', $request->cep);

        $rule = [
            'cep'             => 'required',
            'logradouro'      => 'required',
            'numero'          => 'required',
            'complemento'     => 'nullable',
            'bairro'          => 'required',
            'municipio'       => 'required',
            'estado'          => 'required',
        ];

        // $rule['cep']             = $request['cep'];

        return $rule;
    }

    public function messages()
    {
        $feedback = [

            'cep.required'        => 'O CEP é obrigatório!',
            'logradouro.required' => 'O Endereço é obrigatório!',
            'numero.required'     => 'Informar o número da residência!',
            'bairro.required'     => 'Informar o bairro!',
            'municipio.required'  => 'Informar o município!',
            'estado.required'     => 'Informar o estado!',
        ];

        return $feedback;
    }
}
