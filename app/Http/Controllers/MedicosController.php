<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Requests\MedicosRequest;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class MedicosController extends Controller
{   
    public $conselho = [
        'COREN|Conselho Federal de Enfermagem', 
        'CRAS|Conselho Regional de Assistência Social',
        'CREFITO|Conselho Regional de Fisioterapia e Terapia Ocupacional',
        'CRF|Conselho Regional de Farmácia',
        'CRFA|Conselho Regional de Fonoaudiologia',
        'CRM|Conselho Regional de Medicina',
        'CRN|Conselho Regional de Nutrição',
        'CRO|Conselho Regional de Odontologia',
        'CRP|Conselho Regional de Psicologia',
        'CRV|Conselho Regional de Medicina Veterinária',
        'OUT|Outros Conselhos'
    ];
    public $tipo_p = ['Profissional de saúde', 'Agenda de procedimentos'];
    public $status = ['Ativo', 'Suspenso'];
    public $tipo_sexo = ['Masculino', 'Feminino'];
    public $titulo = ['Dr.','Dr.(a)','Sr.','Sr.(a)'];
    public function index(Request $request)
    {   
        $pesquisa = $request->pesquisa;
        if ($pesquisa != '') {
            $medicos = Medico::where('nome', 'like', "%" . $pesquisa . "%")
                            ->orWhere('medico','like', "%".$pesquisa."%")
            ->paginate(7);
        } else {
            $medicos = Medico::paginate(7);
        }
       
        return view('medicos.index', compact('medicos', 'pesquisa'));
    }

    public function novo()
    {   $titulo = $this->titulo;
        $tipo_sexo = $this->tipo_sexo;
        $conselho = $this->conselho;
        $tipo_p = $this->tipo_p;
        $status = $this->status;
        return view('medicos.form',compact('tipo_p','status','conselho','tipo_sexo','titulo'));
    }
    public function salvar(MedicosRequest $request)
    {
        if ($request->id != '') {
            $medico = Medico::find($request->id);
            $medico->update($request->all());
        } else {
            $medico = Medico::create($request->all());
        }
        
        $validator = Validator::make($request->all(), [    
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->message()->all()[0])->withInput();
        }
        Alert::toast('Salvo com sucesso!', 'success');

        return redirect('/medicos/editar/' . $medico->id);
    }

    public function editar($id)
    {   $titulo = $this->titulo;
        $tipo_sexo = $this->tipo_sexo;
        $conselho = $this->conselho;
        $tipo_p = $this->tipo_p;
        $status = $this->status;
        $medico = Medico::find($id);

        return view('medicos.form', compact('medico','tipo_p','status','conselho','tipo_sexo','titulo'));
    }

    public function deletar($id)
    {
        $medico = Medico::find($id);
        if (!empty($medico)) {
            $medico->delete();
            return redirect('/medicos');
        } else {
            return redirect('/medicos');
        }
    }

    
}
