<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nasc',
        'status',
        'idade',
        'sexo',
        'escolaridade',
        'cep',
        'endereco',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'uf',
        'email',
        'telefone',
        'cargo',
        'data_admiss',
        'data_demiss',
        'responsabilidades',
        'rg',
        'emissor',
        'cpf',
        'foto',
    ]; 
}
