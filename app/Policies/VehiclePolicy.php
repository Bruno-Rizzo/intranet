<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class VehiclePolicy
{
    use HandlesAuthorization;

   public function view()
    {
        return Auth::user()->role->hasPermission('viatura-visualizar');
    }

    public function create()
    {
        return Auth::user()->role->hasPermission('viatura-cadastrar');
    }

    public function update()
    {
        return Auth::user()->role->hasPermission('viatura-editar');
    }

    public function report()
    {
        return Auth::user()->role->hasPermission('viatura-relatório');
    }

    public function search()
    {
        return Auth::user()->role->hasPermission('viatura-pesquisar');
    }

}
