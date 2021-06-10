<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class UsuariosController extends Controller
{
    public $tipo_funcao = ['Admin', 'Membro', 'Usuário'];

    public function index(Request $request)
    {   
        $pesquisa = $request->pesquisa;
        if ($pesquisa != '') {
            $usuarios = User::where('nome', 'like', "%" . $pesquisa . "%")
                            ->orWhere('funcao','like', "%".$pesquisa."%")
            ->paginate(7);
        } else {
            $usuarios = User::paginate(7);
        }
       
        return view('usuarios.index', compact('usuarios', 'pesquisa'));
    }

    public function novo()
    {   
        
        $tipo_funcao = $this->tipo_funcao;
        return view('usuarios.form', compact('tipo_funcao'));
    }
    public function salvar(UserRequest $request)
    {
        if($request->senha != '' ){
            $request['senha'] = bcrypt($request['senha']);
        }else{
            unset($request['senha']);
        }
        if ($request->hasFile('foto_temp')) {

            $nome_documento = date('YmdHmi') . '.' . $request->foto_temp->getClientOriginalExtension();

            $request['foto'] = '/uploads/user/' . $nome_documento;

            $request->foto_temp->move(public_path('uploads/user'), $nome_documento);
        }
        if ($request->id != '') {
            $usuario = User::find($request->id);
            $usuario->update($request->all());
        } else {
            $usuario = User::create($request->all());
        }
        
        $validator = Validator::make($request->all(), [    
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->message()->all()[0])->withInput();
        }
        Alert::toast('Salvo com sucesso!', 'success');

        return redirect('/usuarios/editar/' . $usuario->id);
    }

    public function editar($id)
    {

        $tipo_funcao = $this->tipo_funcao;
        $usuario = User::find($id);

        return view('usuarios.form', compact('tipo_funcao', 'usuario'));
    }

    public function deletar($id)
    {
        $usuario = User::find($id);
        if (!empty($usuario)) {
            $usuario->delete();
            return redirect('/usuarios');
        } else {
            return redirect('/usuarios');
        }
    }

    
}
