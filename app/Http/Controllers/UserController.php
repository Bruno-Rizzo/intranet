<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));

    }

    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('dashboard.users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required','min:6'],
            'email'    => ['required','email','unique:users'],
            'password' => ['required','min:8'],
            'role_id'  => ['required'],
        ],[
            'role_id.required' => 'O campo Função é obrigatório',
            'email.unique'     => 'Este email já está sendo utilizado'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        Alert::toast('Usuário cadastrado!', 'success');
        return to_route('users.index');

    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user','roles'));
    }


    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => ['required','min:3'],
            'email'    => ['required','email',Rule::unique('users')->ignore($user->id)],
            'role_id'  => ['required'],
        ],[
            'role_id.required' => 'O campo Função é obrigatório',
            'email.unique'     => 'Este email já está sendo utilizado'
        ]);

        User::find($user->id)->update($validated);
        Alert::toast('Usuário editado!', 'success');
        return to_route('users.index');
    }

    public function confirm($id)
    {
        Alert::question('Excluir Usuário','Deseja excluir este usuário?')
        ->showConfirmButton('<a href="/users/delete/'.$id.'" style="color:#FFF;text-decoration:none">Excluir</a>', '#BB2D3B')
        ->toHtml()
        ->showCancelButton('Cancelar', '#3085d6')->reverseButtons();
        return redirect()->back();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        Alert::toast('Usuário excluído!', 'error');
        return redirect()->back();
    }

    public function search()
    {
        return view('dashboard.users.search');
    }

    public function findUser(Request $request)
    {
        $request->validate(['name' => 'required']);
        $users = User::where('name','like', '%'.$request->name.'%')->get();

        return view('dashboard.users.search',compact('users'));

    }

    public function show(User $user)
    {
        return view('dashboard.users.password',compact('user'));
    }

    public function password(Request $request , User $user)
    {
        $validated = $request->validate([
            'password' => ['required','min:8']
        ]);

        $validated['password'] = bcrypt($request->password);

        User::find($user->id)->update($validated);
        Alert::toast('Senha alterada!', 'success');
        return to_route('users.index');

    }


}
