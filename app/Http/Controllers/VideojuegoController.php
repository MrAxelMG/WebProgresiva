<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Videojuego;
use App\Models\Materia;
use App\Models\Categoria;
use Illuminate\Support\Str;
// use App\Http\Request\VideojuegoRequest;

class VideojuegoController extends Controller
{
    public function index()
    {
        $videojuegos = Videojuego::all();
        $materias = Materia::all();
        $categorias = Categoria::all();
        return view('admin.videojuegos.videojuegoview', compact('videojuegos', 'materias', 'categorias'));
    }

    public function save(Request $request)
    {
        $videojuegos = new Videojuego;
        $videojuegos->nombre = $request->nombre;
        $videojuegos->plataformas = $request->plataformas;
        $videojuegos->jugadores = $request->jugadores;
        $videojuegos->categoria_id = $request->categoria_id;
        $videojuegos->materia_id = $request->materia_id;
        $videojuegos->save();

        return response($videojuegos);
    }

    public function update(Request $request)
    {
        $videojuegos = Videojuego::find($request->id);
        $videojuegos->nombre = $request->nombre;
        $videojuegos->plataformas = $request->plataformas;
        $videojuegos->jugadores = $request->jugadores;
        $videojuegos->categoria_id = $request->categoria_id;
        $videojuegos->materia_id = $request->materia_id;
        $videojuegos->update();

        return response($videojuegos);
    }

    public function delete(Request $request)
    {
       Videojuego::find($request->id)->delete();
    }
}