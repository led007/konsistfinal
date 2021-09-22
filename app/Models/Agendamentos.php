<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;


    protected $fillable = [
        'paciente_id',
        'medico_id',
        'tipo_a',
        'data_consulta',
        'hora',
        'preco',
        'observacao',
        'consult',
        'status',
    ]; 

    public function medico()
    {
        return $this->hasOne(Medico::class, 'id', 'medico_id');
    }

    public function pacientes()
    {
        return $this->hasOne(Paciente::class, 'id', 'paciente_id');
    }
}
