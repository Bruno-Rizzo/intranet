<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    
    public function index()
    {
        $roles = Role::all();
        return view ('dashboard.roles.index', compact('roles'));
    }

    
    public function create()
    {
        return view ('dashboard.roles.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','min:6',Rule::unique('roles')]
        ],[
            'name.required' => 'O campo Função é obrigatório'
        ]);

        Role::create($validated);
        Alert::toast('Função cadastrada!', 'success');
        return to_route('roles.index');
    }

    
    public function edit(Role $role)
    {
        $permissions = Permission::all(); 
        return view('dashboard.roles.edit',compact('role','permissions'));
    }

    
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => ['required','min:6',Rule::unique('roles')->ignore($role->id)]
        ],[
            'name.unique'     => 'Este email já está sendo utilizado'
        ]);

        Role::find($role->id)->update($validated);
        Alert::toast('Função editada!', 'success');
        return to_route('roles.index');
    }

    public function confirm($id)
    {
        Alert::question('Excluir Função','Deseja excluir esta função?')
        ->showConfirmButton('<a href="/roles/delete/'.$id.'" style="color:#FFF;text-decoration:none">Excluir</a>', '#BB2D3B')
        ->toHtml()
        ->showCancelButton('Cancelar', '#3085d6')->reverseButtons();
        return redirect()->back();
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        Alert::toast('Função excluída!', 'error');
        return redirect()->back();
    }

   
    public function assignPermission(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);
        Alert::toast('Permissões associadas!', 'success');
        return to_route('roles.index');
    
    }

}
