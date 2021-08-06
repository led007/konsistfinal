<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo_p',
        'status',
        'n_conselho',
        'conselho',
        'uf_conselho',
        'data_nasc',
        'endereco',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'uf',
        'email',
        'sexo',
        'rg',
        'emissor',
        'titulo',
        'cpf',
        'telefone',
        'cep'
    ]; 

    public function especialidades() {
        return $this->hasMany(Especialidades::class, 'medico_id');
    }
}
