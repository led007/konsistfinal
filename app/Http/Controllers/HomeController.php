<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\User;
use App\Models\Agendamentos;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $pesquisa = $request->pesquisa;
        $data['pacientes'] = Paciente::get()->count();
        $data['medicos'] = Medico::get()->count();
        $data['usuarios'] = User::get()->count();
        $aser = Agendamentos::where('status','A ser atendido')->count();
        $cancelados = Agendamentos::where('status','Atendimento cancelado')->count();
        $finalizado = Agendamentos::where('status','Atendimento finalizado')->count();
        $proximos = Agendamentos::where('status','A ser atendido')->get();
        $user = User::select('nome', 'id', 'funcao', 'foto')->get();
        if ($pesquisa != '') {
            $agenda = Agendamentos::with('medico', 'pacientes')
                ->where('data', 'like', "%" . $pesquisa . "%")
                ->orWhere('consult', 'like', "%" . $pesquisa . "%")
                ->orWhereHas('medico', function ($query) use ($pesquisa) {
                    $query->where('nome', 'like', "%" . $pesquisa . "%");
                })
                ->orWhereHas('pacientes', function ($query) use ($pesquisa) {
                    $query->where('nome', 'like', "%" . $pesquisa . "%");
                })
                ->paginate(5);
        } else {
            $agenda = Agendamentos::with('medico', 'pacientes')->paginate(5);
        }

        return view('layout.index', compact('data', 'agenda', 'pesquisa', 'user','aser','cancelados','finalizado','proximos'));
    }
}
