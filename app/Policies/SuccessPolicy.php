<?php

namespace App\Policies;

use App\Models\Success;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

// sail artisan make:policy SuccessPolicy --model=Success

class SuccessPolicy
{
    use HandlesAuthorization;

    public function view()
    {
        return Auth::user()->role->hasPermission('êxito-visualizar');
    }

    public function create()
    {
        return Auth::user()->role->hasPermission('êxito-cadastrar');
    }

    public function update()
    {
        return Auth::user()->role->hasPermission('êxito-atualizar');
    }

    public function export()
    {
        return Auth::user()->role->hasPermission('êxito-exportar');
    }
}
