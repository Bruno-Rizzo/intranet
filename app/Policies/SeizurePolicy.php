<?php

namespace App\Policies;

use App\Models\Seizure;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

// sail artisan make:policy SeizurePolicy --model=Seizure

class SeizurePolicy
{
    use HandlesAuthorization;

    public function view()
    {
        return Auth::user()->role->hasPermission('apreensão-visualizar');
    }

    public function create()
    {
        return Auth::user()->role->hasPermission('apreensão-cadastrar');
    }

    public function search()
    {
        return Auth::user()->role->hasPermission('apreensão-pesquisar');
    }

    public function export()
    {
        return Auth::user()->role->hasPermission('apreensão-exportar');
    }
}
