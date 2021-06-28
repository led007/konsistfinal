<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espec;

class EspecController extends Controller
{
    public function salvar(Request $request)
    {
        if ($request->id != '') {
            $espec = Espec::find($request->id);
            $espec->update($request->all());
        } else {
            $espec = Espec::create($request->all());
        }
        
        return redirect('/medicos/novo');
    }

    public function editar($id)
    {   
        $espec = Espec::find($id);

        return view('espec.form', compact('espec'));
    }

    public function deletar($id)
    {
        $espec = Espec::find($id);
        if (!empty($espec)) {
            $espec->delete();
            return redirect('/medicos/novo');
        } else {
            return redirect('/medicos/novo');
        }
    }
}
