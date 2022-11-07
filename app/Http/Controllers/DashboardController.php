<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Escuela;
use App\Models\Videojuego;
use App\Models\Materia;
use App\Models\User;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $escuelasCount = Escuela::count();
        $videojuegosCount = Videojuego::count();
        $materiasCount = Materia::count();
        $usuariosCount = User::count();

        return view('admin.index', compact('escuelasCount', 'videojuegosCount', 'materiasCount', 'usuariosCount'));
    }

}