<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicosRequest extends FormRequest
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
            'sexo' => 'required',
            'status' => 'required',
            'n_conselho' => 'required',
            'conselho' => 'required',
            'uf_conselho' => 'required',
            'cep' => 'required',
            
            
        ];  
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'data_nasc.required' => 'Selecione uma data de nascimento',
            'sexo.required' => 'Selecione o campo sexo',
            'status.required' => 'Escolha um status',
            'n_conselho.required' => 'Número do conselho é obrigatório',
            'conselho.required' => 'O conselho é obrigatório',
            'uf_conselho.required' => 'UF do conselho obrigatório',
            'cep.required' => 'CEP é obrigatório',
           
            
            
        ];
    }
}
