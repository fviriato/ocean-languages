<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserStoreUpdateRequest extends FormRequest
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

        $request['cep']       = str_replace(['.', '-'], '', $request->cep);
        $request['telefone']  = str_replace(['(', ')', '.', '-', ' '], '', $request->telefone);

        $id = $this->segment(2) ?? '';

        $rule = [
            'name'            => 'required|min:3',
            'data_nascimento' => 'required',
            'genero_id'       => 'required|exists:generos,id',
            'email'           => "required|email|unique:users,email,{$id},id",
            'cpf'             => "nullable|min:11|max:11|unique:users,cpf,{$id},id",
            'rg'              => 'nullable',
            'telefone'        => 'nullable',
            'escola_id'       => 'nullable',
            'escolaridade_id' => 'nullable',
        ];


        return $rule;
    }

    public function messages()
    {
        $feedback = [

            'name.required'                         => 'Informar o Nome Completo do Aluno',
            'data_nascimento.required'              => 'Informar a Data de nascimento do Aluno',
            'email.required'                        => 'O e-mail é obrigatório. Caso o aluno seja menor e não tenha e-mail, informe o e-mail de um responsável',
            'email.unique'                          => 'O e-mail informado já está cadastrado',
            'genero_id.required'                    => 'Informar o Gênero do Aluno(a)',
            'cpf.min'                               => 'O CPF deve conter 11 caracteres',
            'cpf.max'                               => 'O CPF Informado é inválido',
            'cpf.unique'                            => 'O CPF Informado já está cadastrado',
            'escola_id.required'                    => 'Informar a escola em que o aluno estuda',
            'escolaridade_id.required'              => 'Informar a escolaridade do aluno',
        ];

        return $feedback;
    }
}
