<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.usuarioview', compact('usuarios'));
    }

    public function save(Request $request)
    {        
        $usuario = new User;

        $usuario->nombre = $request->nombre;
        $usuario->apellidop = $request->apellidop;
        $usuario->apellidom = $request->apellidom;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();

        return response($usuario);
    }

    public function update(Request $request)
    {   
        $usuario = User::find($request->id);            
        $usuario->nombre = $request->nombre;
        $usuario->apellidop = $request->apellidop;
        $usuario->apellidom = $request->apellidom;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();

        return response($usuario);
    }

    public function delete(Request $request)
    {
       User::find($request->id)->delete();
    }
}