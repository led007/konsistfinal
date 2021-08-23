<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AgendamentoRequest;


class AgendaController extends Controller
{   
    public $tipo_a = ['Consulta', 'Exame'];
    public $consult = ['Consultório 1', 'Consultório 2', 'Consultório 3', 'Consultório 4','Consultório 5'];


    public function index(Request $request)
    {   $paciente_id = Paciente::select('nome', 'id')->get();
        $medico_id = Medico::select('nome', 'id')->get();
        $pesquisa = $request->pesquisa;
        if ($pesquisa != '') {
            $agenda = Agenda::with('medico','paciente')
            ->where('nome','like', "%".$pesquisa."%")
            ->orWhere('situacao','like', "%".$pesquisa."%")
            ->orWhereHas('medico', function($query) use ($pesquisa){
                $query->where('nome','like', "%".$pesquisa."%");
            })
            ->paginate(10);
        } else {
            $agenda = Agenda::with('medico')->paginate(10);
        }
       
        return view('agenda.index', compact('agenda', 'pesquisa','medico_id'));
    }

    public function novo()
    {   $tipo_a = $this->tipo_a;
        $consult = $this->consult;
        $paciente_id = Paciente::select('nome', 'id')->get();
        $medico_id = Medico::select('nome', 'id')->get();
        return view('agenda.form', compact('medico_id','paciente_id','tipo_a','consult'));
    }
    public function salvar(AgendamentoRequest $request)
    {
        if ($request->id != '') {
            $agenda = Agenda::find($request->id);
            $agenda->update($request->all());
        } else {
            $agenda = Agenda::create($request->all());
        }
        
        $validator = Validator::make($request->all(), [    
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->message()->all()[0])->withInput();
        }
        Alert::toast('Salvo com sucesso!', 'success');

        return redirect('/agenda/editar/' . $agenda->id);
    }

    public function editar($id)
    {   $consult = $this->consult;
        $tipo_a = $this->tipo_a;
        $medico_id = Medico::select('nome', 'id')->get();
        $paciente_id = Paciente::select('nome', 'id')->get();
        $agenda = Agenda::find($id);

        return view('agenda.form', compact('agenda','medico_id','paciente_id','tipo_a','consult'));
    }

    public function deletar($id)
    {
        $agenda = Agenda::find($id);
        if (!empty($agenda)) {
            $agenda->delete();
            return redirect('/agenda');
        } else {
            return redirect('/agenda');
        }
    }

    
}
