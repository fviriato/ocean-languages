<?php

namespace App\Http\Requests\Aluno;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AlunoRequest extends FormRequest
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
        $idadeAluno = date('Y') - date('Y', strtotime($request->data_nascimento));

        $rule = [
            'name'            => 'required|min:3',
            'data_nascimento' => 'required',
            'genero_id'       => 'required|exists:generos,id',
            'email'           => "required|email|unique:users",
            'cpf'             => "nullable|min:11|max:11|unique:users",
            'rg'              => 'nullable',
            'telefone'        => 'required',
            'cep'             => 'required',
            'logradouro'      => 'required',
            'numero'          => 'required',
            'bairro'          => 'required',
            'municipio'       => 'required',
            'estado'          => 'required',
            'escola_id'       => 'nullable',
            'escolaridade_id' => 'nullable',
        ];

        if ($idadeAluno  < 18) {
            $rule['responsavel_nome']             = 'required';
            $rule['responsavel_data_nascimento']  = 'required';
            $rule['responsavel_email']            = 'required|email';
            $rule['responsavel_cpf']              = "required";
            $rule['responsavel_rg']               = 'nullable';
            $rule['responsavel_telefone']         = 'required';
            $rule['responsavel_escolaridade_id']  = 'nullable|exists:escolaridades,id';
            $rule['responsavel_cep']              = 'required';
            $rule['responsavel_logradouro']       = 'required';
            $rule['responsavel_numero']           = 'required';
            $rule['responsavel_complemento']      = 'nullable';
            $rule['responsavel_bairro']           = 'required';
            $rule['responsavel_municipio']        = 'required';
            $rule['responsavel_estado']           = 'required';
        }

        return $rule;
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
            'name.required'             => 'Informar o nome completo do(a) aluno(a)',
            'name.min'                  => 'O nome do(a) aluno(a) deve conter no mínimo 03 caracteres',
            'data_nascimento.required'  => 'Informar a data de nascimento do(a) aluno(a)',
            'genero_id.required'        => 'Informar o gênero do(a) aluno(a)',
            'email.required'            => 'O e-mail do(a) aluno(a) é obrigatório',
            'email.unique'              => 'O e-mail informado já está cadastrado',
            'cpf.min'                   => 'O CPF deve conter 11 numeros',
            'cpf.max'                   => 'O CPF deve conter 11 numeros',
            'cpf.unique'                => 'O CPF do aluno informado já está cadastrado',
            'telefone.required'         => 'Informar o telefone de contato do(a) aluno(a)',
            'cep.required'              => 'Digitar o CEP da residência do(a) aluno(a)',
            'logradouro.required'       => 'O endereço é obrigatório',
            'numero.required'           => 'O número da residência é obrigatório',
            'bairro.required'           => 'Informar o bairro',
            'municipio.required'        => 'Informar a cidade',
            'estado.required'           => 'Infomar o estado',

            'responsavel_nome.required'             => 'O Aluno é menor de Idade, obrigatório infomar o nome do responsável',
            'responsavel_data_nascimento.required'  => 'Informar a data de nascimento do responsável',
            'responsavel_email.required'            => 'Informar o e-mail do responsável',
            'responsavel_email.unique'              => 'O e-mail informado para o responsável já está cadastrado',
            'responsavel_cpf.required'              => 'O CPF do responsável é obrigatório',
            'responsavel_telefone.required'         => 'Informar o telefone de contato do responsável',
            'responsavel_cep.required'              => 'Informar o CEP da residência do responsável',
            'responsavel_logradouro.required'       => 'Informar o endereço do responsável',
            'responsavel_numero.required'           => 'Informar o número da residência do responsável',
            'responsavel_bairro.required'           => 'Informar o bairro da residência do responsável',
            'responsavel_municipio.required'        => 'Informar o município de residência do responsável',
            'responsavel_estado.required'           => 'Informar o estado de residência do responsável',

        ];
    }
}
