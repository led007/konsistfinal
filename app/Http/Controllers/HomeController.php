<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\User;
use App\Models\Agendamentos;

class HomeController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;
        $data['pacientes'] = Paciente::get()->count();
        $data['medicos'] = Medico::get()->count();
        $data['usuarios'] = User::get()->count();
        if ($pesquisa != '') {
            $agenda = Agendamentos::with('medico','pacientes')
            ->where('data','like', "%".$pesquisa."%")
            ->orWhere('consult','like', "%".$pesquisa."%")
            ->orWhereHas('medico', function($query) use ($pesquisa){
                $query->where('nome','like', "%".$pesquisa."%");
            })
            ->orWhereHas('pacientes', function($query) use ($pesquisa){
                $query->where('nome','like', "%".$pesquisa."%");
            })
            ->paginate(10);
        } else {
            $agenda = Agendamentos::with('medico','pacientes')->paginate(10);
        }
       
        return view('layout.index', compact('data','agenda'));
    }
}
