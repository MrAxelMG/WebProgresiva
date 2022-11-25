<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/admin/example', 'admin.example');
Route::view('/admin/ejemplo', 'ejemplo');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/admin/ejemplos', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');

Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('admin');

Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->middleware('auth');
Route::post('/admin/roles/save', [App\Http\Controllers\RoleController::class, 'save'])->middleware('auth');
Route::post('/admin/roles/update', [App\Http\Controllers\RoleController::class, 'update'])->middleware('auth');
Route::post('/admin/roles/delete', [App\Http\Controllers\RoleController::class, 'delete'])->middleware('auth');

Route::get('/admin/materias', [App\Http\Controllers\MateriaController::class, 'index'])->middleware('auth');
Route::post('/admin/materias/save', [App\Http\Controllers\MateriaController::class, 'save'])->middleware('auth');
Route::post('/admin/materias/update', [App\Http\Controllers\MateriaController::class, 'update'])->middleware('auth');
Route::post('/admin/materias/delete', [App\Http\Controllers\MateriaController::class, 'delete'])->middleware('auth');

Route::get('/admin/escuelas', [App\Http\Controllers\EscuelaController::class, 'index'])->middleware('auth');
Route::post('/admin/escuelas/save', [App\Http\Controllers\EscuelaController::class, 'save'])->middleware('auth');
Route::post('/admin/escuelas/update', [App\Http\Controllers\EscuelaController::class, 'update'])->middleware('auth');
Route::post('/admin/escuelas/delete', [App\Http\Controllers\EscuelaController::class, 'delete'])->middleware('auth');

Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->middleware('auth');
Route::post('/admin/categorias/save', [App\Http\Controllers\CategoriaController::class, 'save'])->middleware('auth');
Route::post('/admin/categorias/update', [App\Http\Controllers\CategoriaController::class, 'update'])->middleware('auth');
Route::post('/admin/categorias/delete', [App\Http\Controllers\CategoriaController::class, 'delete'])->middleware('auth');

Route::get('/admin/videojuegos', [App\Http\Controllers\VideojuegoController::class, 'index'])->middleware('auth');
Route::post('/admin/videojuegos/save', [App\Http\Controllers\VideojuegoController::class, 'save'])->middleware('auth');
Route::post('/admin/videojuegos/update', [App\Http\Controllers\VideojuegoController::class, 'update'])->middleware('auth');
Route::post('/admin/videojuegos/delete', [App\Http\Controllers\VideojuegoController::class, 'delete'])->middleware('auth');

Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->middleware('auth');
Route::post('/admin/usuarios/save', [App\Http\Controllers\UsuarioController::class, 'save'])->middleware('auth');
Route::post('/admin/usuarios/update', [App\Http\Controllers\UsuarioController::class, 'update'])->middleware('auth');
Route::post('/admin/usuarios/delete', [App\Http\Controllers\UsuarioController::class, 'delete'])->middleware('auth');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'destroy']);

Route::get('/offline', function(){
    return view('vendor.laravelpwa.offline');
});