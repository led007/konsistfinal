<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Requests\MedicosRequest;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Especialidades;

use PDF;


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
        $espec_id = Especialidades::select('nome', 'id')->get();
        if ($pesquisa != '') {
            $medicos =  $medicos = Medico::with('especialidades')
                            ->where('nome', 'like', "%".$pesquisa."%")
                           
            ->paginate(10);
        } else {
            $medicos = Medico::with('especialidades')->paginate(10);
        }
       
        return view('medicos.index', compact('medicos', 'pesquisa','espec_id'));
    }

    public function novo()
    {   
        $titulo = $this->titulo;
        $tipo_sexo = $this->tipo_sexo;
        $conselho = $this->conselho;
        $tipo_p = $this->tipo_p;
        $status = $this->status;
        return view('medicos.form',compact('tipo_p','status','conselho','tipo_sexo','titulo'));
    }
    public function salvar(MedicosRequest $request)
    {
        $especialidades = $request->especialidades;
        unset($request['especialidades']);

        $novas_especialidades = [];
        $nova_especialidade = [];


        if($request->id == '') {
            $medico = Medico::create($request->all());
            
            
        } else {
            
            $medico = Medico::find($request->id);
            $medico->update($request->all());
            Especialidades::where('medico_id', '=', $medico->id)->delete();
        }
        foreach($especialidades as $espec) {
            $nova_especialidade['nome'] = $espec;
            $nova_especialidade['medico_id'] = $medico->id;
            $novas_especialidades[] = Especialidades::create($nova_especialidade);                
        }
        $validator = Validator::make($request->all(), [    
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->message()->all()[0])->withInput();
        }
        Alert::toast('Salvo com sucesso!', 'success');

        return redirect('/medicos/editar/' . $medico->id);
    }

    public function gerar_pdf($id){
        
        $medicos = Medico::find($id);
        view()->share('medicos', $medicos);
        $pdf_doc = PDF::loadView('medicos.gerar_pdf', $medicos);
        
        return $pdf_doc->stream('medicos.pdf');
    }

    public function editar($id)
    {   

        $titulo = $this->titulo;
        $tipo_sexo = $this->tipo_sexo;
        $conselho = $this->conselho;
        $tipo_p = $this->tipo_p;
        $status = $this->status;
        $medico = Medico::find($id);
        $medicos = Medico::select('id', 'nome')->get();
        $medico = Medico::with('especialidades')->find($id);

        return view('medicos.form', compact('medico','tipo_p','status','conselho','tipo_sexo','titulo','medicos'));
    }

    public function deletar($id)
    {
        $medico = Medico::find($id);
        if (!empty($medico)) {
            Especialidades::where('medico_id','=', $id)->delete();
            $medico->delete();
            return redirect('/medicos');
        } else {
            return redirect('/medicos');
        }
    }
    public function especialidades($medico = '') {
        $especialidades = Especialidades::select('id', 'nome')->get();
        if($medico != '') {
            $especialidades = Especialidades::select('id', 'nome')->where('medico_id', '=', $medico)->get();
        }
        
        return response()->json(['especialidades' => $especialidades]);
    }
    
}
