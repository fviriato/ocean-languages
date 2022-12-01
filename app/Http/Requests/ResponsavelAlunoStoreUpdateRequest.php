<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ResponsavelAlunoStoreUpdateRequest extends FormRequest
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


        $request['responsavel_cpf'] = str_replace(['.', '-'], '', $request->responsavel_cpf);

        $request['idade'] = date('Y') - date('Y', strtotime($request->data_nascimento));

        // dd($this->segment(2));

        $userId = $this->segment(2); //$this->segment(2) ?? '';


        if ($request['idade'] < 18) {
            $rule['responsavel_nome']             = 'required';
            $rule['responsavel_data_nascimento']  = 'required';
            $rule['responsavel_email']            = 'required';
            $rule['responsavel_cpf']              = "nullable|unique:responsavels,responsavel_cpf,{$userId}";
            $rule['responsavel_rg']               = 'nullable';
            $rule['responsavel_telefone']         = 'required';
            $rule['responsavel_escola_id']        = 'nullable|exists:escolas,id';
            $rule['responsavel_escolaridade_id']  = 'nullable|exists:escolaridades,id';
            $rule['responsavel_cep']              = 'required';
            $rule['responsavel_logradouro']       = 'required';
            $rule['responsavel_numero']           = 'required';
            $rule['responsavel_complemento']      = 'nullable';
            $rule['responsavel_bairro']           = 'required';
            $rule['responsavel_municipio']        = 'required';
            $rule['responsavel_estado']           = 'required';
        }


        return $rule ?? [];
    }

    public function messages()
    {
        $feedback = [
            'responsavel_nome.required'             => 'O Aluno é menor de Idade, obrigatório infomar um responsável',
            'responsavel_data_nascimento.required'  => 'Informar a data de nascimento do responsável',
            'responsavel_email.required'            => 'Informar o e-mail do responsável',
            // 'responsavel_cpf.required'              => 'Informar o CPF do responsável',
            'responsavel_telefone.required'         => 'Informar o telefone de contato do responsável',
            'responsavel_cep.required'              => 'Informar o CEP da residência do responsável',
            'responsavel_logradouro.required'       => 'Informar o endereço do responsável',
            'responsavel_numero.required'           => 'Informar o número da residência do responsável',
            'responsavel_bairro.required'           => 'Informar o bairro da residência do responsável',
            'responsavel_municipio.required'        => 'Informar o município de residência do responsável',
            'responsavel_estado.required'           => 'Informar o estado de residência do responsável',
        ];

        return $feedback;
    }
}
