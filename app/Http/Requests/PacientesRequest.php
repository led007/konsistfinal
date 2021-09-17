<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacientesRequest extends FormRequest
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
            'nome' => 'required',
            'data_nasc' => 'required',
            'idade' => 'required',
            'sexo' => 'required',
            'situacao' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'cep' => 'required',
            'telefone' => 'required'
            
        ];  
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'data_nasc.required' => 'Selecione uma data de nascimento',
            'idade.required' => 'A Idade é obrigatória',
            'sexo.required' => 'Selecione o campo sexo',
            'situacao.required' => 'Escolha uma situação',
            'endereco.required' => 'Endereço é obrigatório',
            'email.required' => 'Email é obrigatório',
            'cep.required' => 'O CEP é obrigatório',
            'telefone.required' => 'O telefone é obrigatório',
            
            
        ];
    }
}
