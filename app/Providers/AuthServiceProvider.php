<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function(){
            return Auth::user()->role_id ==1 ? true : false;
        }); 

    }

}
