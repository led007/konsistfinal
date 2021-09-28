<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionariosRequest extends FormRequest
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
            'nome',
            'data_nasc',
            'status',
            'idade',
            'sexo',
            'escolaridade',
            'cep',
            'email',
            'telefone',
            'cargo',
            'data_admiss',            
        ];  
    }
    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'data_nasc.required' => 'Selecione uma data de nascimento',
            'idade.required' => 'A Idade é obrigatória',
            'sexo.required' => 'Selecione o campo sexo',
            'status.required' => 'Defina um status',
            'email.required' => 'Email é obrigatório',
            'cep.required' => 'O CEP é obrigatório',
            'telefone.required' => 'O telefone é obrigatório',
            'cargo.required' => 'O cargo é obrigatório',
            'data_admiss.required' => 'A data de admissão é obrigatória',         
        ];
    }
}
