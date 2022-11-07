<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Escuela;
use Illuminate\Support\Str;
// use App\Http\Request\EscuelaRequest;

class EscuelaController extends Controller
{
    public function index()
    {
        $escuelas = Escuela::all();
        return view('admin.escuelas.escuelaview', compact('escuelas'));
    }

    public function save(Request $request)
    {
        $escuela = new Escuela;
        $escuela->nombre = $request->nombre;
        $escuela->direccion = $request->direccion;
        $escuela->col_fracc = $request->col_fracc;
        $escuela->cp = $request->cp;
        $escuela->ciudad = $request->ciudad;
        $escuela->estado = $request->estado;
        $escuela->pais = $request->pais;
        $escuela->save();

        return response($escuela);
    }

    public function update(Request $request)
    {
        $escuela = Escuela::find($request->id);
        $escuela->nombre = $request->nombre;
        $escuela->direccion = $request->direccion;
        $escuela->col_fracc = $request->col_fracc;
        $escuela->cp = $request->cp;
        $escuela->ciudad = $request->ciudad;
        $escuela->estado = $request->estado;
        $escuela->pais = $request->pais;
        $escuela->save();

        return response($escuela);
    }

    public function delete(Request $request)
    {
       Escuela::find($request->id)->delete();
    }
}