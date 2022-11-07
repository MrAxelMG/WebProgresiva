<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Str;
// use App\Http\Request\CategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.categoriaview', compact('categorias'));
    }

    public function save(Request $request)
    {
        $categorias = new Categoria;

        $categorias->name = $request->name;
        $categorias->key_name = Str::slug($request->name);
        $categorias->save();

        return response($categorias);
    }

    public function update(Request $request)
    {
        $categorias = Categoria::find($request->id);

        $categorias->name = $request->name;
        $categorias->key_name = Str::slug($request->name);
        $categorias->update();
        
        return response($categorias);

    }

    public function delete(Request $request)
    {
        // echo json_encode($request);
       Categoria::find($request->id)->delete();
    }
}