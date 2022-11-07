<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Materia;
use Illuminate\Support\Str;
// use App\Http\Request\MateriaRequest;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('admin.materias.materiaview', compact('materias'));
    }

    public function save(Request $request)
    {
        $materias = new Materia;

        $materias->name = $request->name;
        $materias->key_name = Str::slug($request->name);
        $materias->save();

        return response($materias);
    }

    public function update(Request $request)
    {
        $materias = Materia::find($request->id);

        $materias->name = $request->name;
        $materias->key_name = Str::slug($request->name);
        $materias->update();
        
        return response($materias);

    }

    public function delete(Request $request)
    {
       Materia::find($request->id)->delete();
    }
}