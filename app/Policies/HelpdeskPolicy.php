<?php

namespace App\Policies;

use App\Models\Helpdesk;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

// sail artisan make:policy HelpdeskPolicy --model=Helpdesk

class HelpdeskPolicy
{
    use HandlesAuthorization;

    public function view()
    {
        return Auth::user()->role->hasPermission('helpdesk-visualizar');
    }

    public function update()
    {
        return Auth::user()->role->hasPermission('helpdesk-editar');
    }

    public function delete()
    {
        return Auth::user()->role->hasPermission('helpdesk-excluir');
    }

}
