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

Route::view('/admin', 'admin.index');
Route::view('/admin/example', 'admin.example');
Route::view('/admin/ejemplo', 'ejemplo');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/ejemplos', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');

//Para acceder al antiguo menu del rol descomentar la siguiente linea:
// Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('home');