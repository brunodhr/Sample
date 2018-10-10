<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnviarDoacaoRequest extends FormRequest
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
            'nome' => 'required|max:20',
            'email' => 'required|max:30',
            'tipocontribuicao' => 'required',
            'contribuicao' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'numero1' => 'required',
            'numero2' => '',
            'cpf' => 'required',
            'cep' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'bairro' => 'required',
            'logradouro' => 'required',
            'complemento' => '',
            'numero' => 'required',
        ];
    }
}
