<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Requests\PacientesRequest;
use App\Models\Medico;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class PacientesController extends Controller
{   public $tipo_sexo = ['Masculino', 'Feminino'];
    public $situacao = ['Em tratamento', 'Sem tratamento','Hormonioterapia','Falecido'];
    public $civil = ['Solteiro(a)', 'Casado(a)','Divorciado(a)','Viúvo(a)','União estável'];
   
    public function index(Request $request)
    {   $medico_id = Medico::select('nome', 'id')->get();
        $pesquisa = $request->pesquisa;
        if ($pesquisa != '') {
            $pacientes = Paciente::with('medico')
            ->where('nome','like', "%".$pesquisa."%")
            ->orWhere('situacao','like', "%".$pesquisa."%")
            ->orWhereHas('medico', function($query) use ($pesquisa){
                $query->where('nome','like', "%".$pesquisa."%");
            })
            ->paginate(10);
        } else {
            $pacientes = Paciente::with('medico')->paginate(10);
        }
       
        return view('pacientes.index', compact('pacientes', 'pesquisa','medico_id'));
    }

    public function novo()
    {   
        $medico_id = Medico::select('nome', 'id')->get();
        $civil = $this->civil;
        $tipo_sexo = $this->tipo_sexo;
        $situacao = $this->situacao;
        return view('pacientes.form', compact('tipo_sexo','situacao','civil','medico_id'));
    }
    public function salvar(PacientesRequest $request)
    {
        if ($request->id != '') {
            $paciente = Paciente::find($request->id);
            $paciente->update($request->all());
        } else {
            $paciente = Paciente::create($request->all());
        }
        
        $validator = Validator::make($request->all(), [    
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->message()->all()[0])->withInput();
        }
        Alert::toast('Salvo com sucesso!', 'success');

        return redirect('/pacientes/editar/' . $paciente->id);
    }

    public function editar($id)
    {   
        $medico_id = Medico::select('nome', 'id')->get();
        $civil = $this->civil;
        $tipo_sexo = $this->tipo_sexo;
        $situacao = $this->situacao;
        $paciente = Paciente::find($id);

        return view('pacientes.form', compact('paciente','tipo_sexo','situacao','civil','medico_id'));
    }

    public function deletar($id)
    {
        $paciente = Paciente::find($id);
        if (!empty($paciente)) {
            $paciente->delete();
            return redirect('/pacientes');
        } else {
            return redirect('/pacientes');
        }
    }

    
}
