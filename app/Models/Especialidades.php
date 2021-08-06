<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'medico_id',
    ];



    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id', 'medico_id');
    }
}
