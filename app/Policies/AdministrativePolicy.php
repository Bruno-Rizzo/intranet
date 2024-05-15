<?php

namespace App\Policies;

use App\Models\Administrative;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

//sail artisan make:policy AdministrativePolicy --model=Administrative

class AdministrativePolicy
{
    use HandlesAuthorization;


    public function view()
    {
        return Auth::user()->role->hasPermission('administrativo-visualizar');
    }

    public function create()
    {
        return Auth::user()->role->hasPermission('administrativo-cadastrar');
    }

    public function update()
    {
        return Auth::user()->role->hasPermission('administrativo-editar');
    }

    public function report()
    {
        return Auth::user()->role->hasPermission('administrativo-relatório');
    }

    public function search()
    {
        return Auth::user()->role->hasPermission('administrativo-pesquisar');
    }

    public function movement()
    {
        return Auth::user()->role->hasPermission('administrativo-movimentação');
    }

    public function acaution()
    {
        return Auth::user()->role->hasPermission('administrativo-acautelamento');
    }

}
