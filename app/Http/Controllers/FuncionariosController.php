<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Http\Requests\FuncionariosRequest;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class FuncionariosController extends Controller
{
    public $tipo_sexo = ['Masculino', 'Feminino'];
    public $status = ['Ativo', 'Suspenso'];
    public $escolaridade = ['Ensino Médio', 'Graduação', 'Graduação Incompleta', 'Pós-graduado', 'Ensino Técnico'];
    public function index(Request $request)
    {
        $pesquisa = $request->pesquisa;
        if ($pesquisa != '') {
            $funcionarios = Funcionario::where('nome', 'like', "%" . $pesquisa . "%")
                ->orWhere('situacao', 'like', "%" . $pesquisa . "%")
                ->paginate(10);
        } else {
            $funcionarios = Funcionario::paginate(10);
        }

        return view('funcionarios.index', compact('funcionarios', 'pesquisa'));
    }

    public function novo()
    {
        $tipo_sexo = $this->tipo_sexo;
        $status = $this->status;
        $escolaridade = $this->escolaridade;
        return view('funcionarios.form', compact('tipo_sexo', 'escolaridade','status'));
    }
    public function salvar(Request $request)
    {
        if ($request->id != '') {
            $funcionarios = Funcionario::find($request->id);
            $funcionarios->update($request->all());
        } else {
            $funcionarios = Funcionario::create($request->all());
        }
        if($request->hasFile('foto')) {
                    //echo 'tem documento';
                     // renomeando documento 
                    $nome_documento = date('YmdHmi').'.'.$request->foto->getClientOriginalExtension();
        
                   $request['foto'] = '/public/uploads/funcionarios' . $nome_documento;
        
                    $request->foto->move(public_path('/public/uploads/funcionarios'), $nome_documento);
                }

        $validator = Validator::make($request->all(), []);
        if ($validator->fails()) {
            return back()->with('errors', $validator->message()->all()[0])->withInput();
        }
        Alert::toast('Salvo com sucesso!', 'success');

        return redirect('/funcionarios/editar/' . $funcionarios->id);
    }

    public function editar($id)
    {
        $status = $this->status;
        $tipo_sexo = $this->tipo_sexo;
        $escolaridade = $this->escolaridade;
        $funcionario = Funcionario::find($id);

        return view('funcionarios.form', compact('funcionario', 'tipo_sexo', 'escolaridade','status'));
    }

    public function deletar($id)
    {
        $funcionario = Funcionario::find($id);
        if (!empty($funcionario)) {
            $funcionario->delete();
            return redirect('/funcionarios');
        } else {
            return redirect('/funcionarios');
        }
    }
}
