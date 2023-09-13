<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\ImageUpload;
use App\Models\Helpdesk;
use Illuminate\Support\Facades\Route;


/* =============================== ROTAS DA INTRANET ===================================== */

Route::controller(SiteController::class)->group(function(){
    Route::get('/',         'index')    ->name('home');
    Route::get('/links',    'links')    ->name('site.links');
    Route::get('/helpdesk', 'helpdesk') ->name('site.helpdesk');
    Route::get('/sobre',    'sobre')    ->name('site.sobre');
});

Route::post('/helpdesk', [HelpdeskController::class, 'store'])->name('helpdesk.store');


/* ========================================================================================= */




/* ================================ ROTAS DO DASHBOARD ===================================== */


Route::middleware('auth')->group(function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    /* =========================== ROTAS DE ADMINISTRADOR ================================== */

    Route::middleware('admin')->group(function(){

        Route::controller(UserController::class)->group(function(){
            Route::get('/users',                'index')    ->name('users.index');
            Route::get('/users/create',         'create')   ->name('users.create');
            Route::post('/users/store',         'store')    ->name('users.store');
            Route::get('/users/{user}/edit',    'edit')     ->name('users.edit');
            Route::put('/users/{user}',         'update')   ->name('users.update');
            Route::get('/users/confirm/{id}',   'confirm')  ->name('users.confirm');
            Route::get('/users/delete/{id}',    'delete')   ->name('users.delete');
            Route::get('/users/search',         'search')   ->name('users.search');
            Route::post('/users/search',        'findUser') ->name('users.find');
            Route::get('/users/{user}/show',    'show')     ->name('users.show');
            Route::put('users/password/{user}', 'password') ->name('users.password');
        });

        Route::controller(RoleController::class)->group(function(){
            Route::get('/roles',                      'index')            ->name('roles.index');
            Route::get('/roles/create',               'create')           ->name('roles.create');
            Route::post('/roles/store',               'store')            ->name('roles.store');
            Route::get('/roles/{role}/edit',          'edit')             ->name('roles.edit');
            Route::put('/roles/{role}',               'update')           ->name('roles.update');
            Route::get('/roles/delete/{id}',          'delete')           ->name('roles.delete');
            Route::get('/roles/confirm/{id}',         'confirm')          ->name('roles.confirm');
            Route::post('/roles/{role}/permissions/', 'assignPermission') ->name('roles.permissions');
        });

    });

    // =====================================================================================================


    /* ===================================== ROTAS HELPDESK ================================================ */

    Route::controller(HelpdeskController::class)->group(function(){
        Route::get('/helpdesk/list',            'index')   ->name('helpdesk.index');
        Route::get('/helpdesk/{helpdesk}/edit', 'edit')    ->name('helpdesk.edit');
        Route::put('/helpdesk/{helpdesk}',      'update')  ->name('helpdesk.update');
        Route::get('/helpdesk/confirm/{id}',    'confirm') ->name('helpdesk.confirm');
        Route::get('/helpdesk/delete/{id}',     'delete')  ->name('helpdesk.delete');
    });

    // =====================================================================================================



    /* ================================= ROTAS DE PERFIL DE USUÁRIO ======================================== */

    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile' ,                 'index')          ->name('profile.index');
        Route::put('/profile/{user}' ,          'update')         ->name('profile.update');
        Route::get('/profile/password' ,        'password')       ->name('profile.password');
        Route::put('/profile/password/{user}' , 'updatePassword') ->name('profile.update.password');
    });

    // ==========================================================================================================



});

// ===============================================================================================================

require __DIR__.'/auth.php';

