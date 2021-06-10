<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nasc',
        'idade',
        'sexo',
        'medico',
        'situacao',
        'cep',
        'endereco',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'uf',
        'email',
        'telefone',
        'nome_social',
        'rg',
        'emissor',
        'cpf',
        'civil',
        'nome_mae',
        'nome_pai',
        'nome_rep'
    ]; 
}
