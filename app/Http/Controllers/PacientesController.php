<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Requests\PacientesRequest;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class PacientesController extends Controller
{   public $tipo_sexo = ['Masculino', 'Feminino'];
    public $situacao = ['Em tratamento', 'Sem tratamento','Hormonioterapia','Falecido'];
    public $civil = ['Solteiro(a)', 'Casado(a)','Divorciado(a)','Viúvo(a)','União estável'];
   
    public function index(Request $request)
    {   
        $pesquisa = $request->pesquisa;
        if ($pesquisa != '') {
            $pacientes = Paciente::where('nome', 'like', "%" . $pesquisa . "%")
                            ->orWhere('funcao','like', "%".$pesquisa."%")
            ->paginate(7);
        } else {
            $pacientes = Paciente::paginate(7);
        }
       
        return view('pacientes.index', compact('pacientes', 'pesquisa'));
    }

    public function novo()
    {   $civil = $this->civil;
        $tipo_sexo = $this->tipo_sexo;
        $situacao = $this->situacao;
        return view('pacientes.form', compact('tipo_sexo','situacao','civil'));
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
    {$civil = $this->civil;
        $tipo_sexo = $this->tipo_sexo;
        $situacao = $this->situacao;
        $paciente = Paciente::find($id);

        return view('pacientes.form', compact('paciente','tipo_sexo','situacao','civil'));
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
