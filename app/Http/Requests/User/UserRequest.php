<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'            => 'required|min:3',
            'data_nascimento' => 'required',
            'genero_id'       => 'required|exists:generos,id',
            'email'           => "required|email|unique:users",
            'cpf'             => "required|min:14|max:14|unique:users",
            'rg'              => 'nullable',
            'telefone'        => 'required',
            'foto'            => 'nullable',
            'profissao'       => 'nullable',
        ];


    }

    public function attributes()
    {
        return [
            'name'            => 'nome completo do aluno',
            'genero_id'       => 'genero',
            'data_nascimento' => 'data de nascimento'
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Informar o nome completo',
            'name.min'                  => 'O nome deve conter no mínimo 03 caracteres',
            'data_nascimento.required'  => 'Informar a data de nascimento',
            'genero_id.required'        => 'Informar o gênero',
            'email.required'            => 'O e-mail é obrigatório',
            'email.unique'              => 'O e-mail informado já está cadastrado',
            'cpf.required'              => 'O CPF é obrigatório',
            'cpf.min'                   => 'O CPF deve conter 11 numeros',
            'cpf.max'                   => 'O CPF deve conter 11 numeros',
            'cpf.unique'                => 'O CPF do aluno informado já está cadastrado',
            'telefone.required'         => 'Informar o telefone de contato',
        ];
    }
}
