<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendamentoRequest extends FormRequest
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
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'tipo_a' => 'required',
            'data_consulta' => 'required',
            'hora' => 'required',
            'preco' => 'required',
            'consult' => 'required', 
        ];  
    }

    public function messages()
    {
        return [
            'paciente_id.required' => 'O Paciente é obrigatório',
            'medico_id.required' => 'O Médico é obrigatório',
            'tipo_a.required' => 'Selecione o campo tipo',
            'data_consulta.required' => 'A data da consulta é obrigatória',
            'hora.required' => 'A hora é obrigatória',
            'preco.required' => 'O preço é obrigatório',
            'consult.required' => 'Selecione um consultório',   
        ];
    }
}
