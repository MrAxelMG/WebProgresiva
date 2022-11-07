<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;
// use App\Http\Request\RoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.roleview', compact('roles'));
    }

    public function save(Request $request)
    {
        $roles = new Role;

        $roles->name = $request->name;
        $roles->key_name = Str::slug($request->name);
        $roles->save();

        return response($roles);
    }

    public function update(Request $request)
    {
        $roles = Role::find($request->id);

        $roles->name = $request->name;
        $roles->key_name = Str::slug($request->name);
        $roles->update();
        
        return response($roles);

    }

    public function delete(Request $request)
    {
       Role::find($request->id)->delete();
    }
}