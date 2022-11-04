<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;
use App\Http\Request\RoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        // return view('ejemplo', compact('roles'));
        
        //Para acceder al antiguo menu del rol descomentar la siguiente linea:
        return view('admin.roles.roleview', compact('roles'));
    }

    public function save(RoleRequest $request)
    {
        $roles = new Role;

        $roles->name = $request->name;
        $roles->key_name = Str::slug($request->name);
        $roles->save();

        return redirect('roles');
    }

    public function update($id)
    {
        $roles = Role::find($id);

        $roles->name = 'Administrativos';
        $roles->key_name = 'administrativos';

        $roles->update();
    }

    public function delete($id)
    {
       Role::find($id)->delete();
    }
}