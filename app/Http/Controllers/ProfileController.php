<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
            'image' => 'image'
        ], [
            'image.image'  => 'O campo Imagem deve ser uma imagem',
            'email.unique' => 'Este email já esta sendo utilizado',
        ]);

        $profile = $request->except('_token');

        if ($request->image) {

            $file =  $request->image;

            $filename = date('dmYHi') . $request->image->getClientOriginalName();
            $file->move(public_path('backend/assets/avatars'), $filename);
            $profile['image'] = $filename;
        }

        User::find(Auth::id())->update($profile);
        Alert::toast('Perfil editado com sucesso!', 'success');
        return to_route('profile.index');
    }

    public function password()
    {
        return view('dashboard.profile.password');
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'oldPassword'     => ['required'],
            'password'        => ['required', 'min:8'],
            'confirmPassword' => ['required', 'same:password'],
        ], [
            'oldPassword.required'     => 'O campo Senha Atual é obrigatório',
            'confirmPassword.required' => 'O campo Confirma Senha é obrigatório',
            'confirmPassword.same'     => 'O campo Nova Senha e Confima Senha não conferem',
        ]);

        if (Hash::check($request->oldPassword, $user->password)) {

            $user->password = bcrypt($request->password);
            $user->save();

            Alert::toast('Senha alterada!', 'success');
            return to_route('profile.password');
            
        } else {

            Alert::toast('Senha Incorreta!', 'error');
            return to_route('profile.password');
        }
    }

    // public function search()
    // {
    //     return view('dashboard.users.search');
    // }
}
