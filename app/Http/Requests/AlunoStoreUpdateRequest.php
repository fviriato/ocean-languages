<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AlunoStoreUpdateRequest extends FormRequest
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
        $request['matricula'] = '123A';

        // dd($request->all());

        $rule = [
            'escola_id'       => 'nullable',
            'escolaridade_id' => 'nullable',

        ];

        return $rule;
    }

    public function messages()
    {
        $feedback = [

            'user_id.required'                      => 'Informar o Nome Completo do Aluno',
            // 'escola_id.required'                    => 'Informar a escola em que o aluno estuda',
            // 'escolaridade_id.required'              => 'Informar a escolaridade do aluno',
        ];

        return $feedback;
    }
}
