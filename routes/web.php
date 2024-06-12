<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AutocodeController;
use App\Http\Controllers\SeizureController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\AdministrativeController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


/* =============================== ROTAS DA INTRANET ===================================== */

Route::controller(SiteController::class)->group(function(){
    Route::get('/',         'index')    ->name('home');
    Route::get('/links',    'links')    ->name('site.links');
    Route::get('/helpdesk', 'helpdesk') ->name('site.helpdesk');
    Route::get('/sobre',    'sobre')    ->name('site.sobre');
});

Route::post('/helpdesk', [HelpdeskController::class, 'store'])->name('helpdesk.store');


Route::controller(AutocodeController::class)->group(function(){
    Route::get('/qrcode' ,         'index')  ->name('qrcode.index');
    Route::post('/qrcode/store' ,  'store')  ->name('qrcode.store');
});



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



    /* ===================================== ROTAS HELPDESK ================================================ */

    Route::controller(HelpdeskController::class)->group(function(){
        Route::get('/helpdesk/list',            'index')   ->name('helpdesk.index');
        Route::get('/helpdesk/{helpdesk}/edit', 'edit')    ->name('helpdesk.edit');
        Route::put('/helpdesk/{helpdesk}',      'update')  ->name('helpdesk.update');
        Route::get('/helpdesk/confirm/{id}',    'confirm') ->name('helpdesk.confirm');
        Route::get('/helpdesk/delete/{id}',     'delete')  ->name('helpdesk.delete');
    });



    /* ================================= ROTAS DE PERFIL DE USUÁRIO ======================================== */

    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile' ,                 'index')          ->name('profile.index');
        Route::put('/profile/{user}' ,          'update')         ->name('profile.update');
        Route::get('/profile/password' ,        'password')       ->name('profile.password');
        Route::put('/profile/password/{user}' , 'updatePassword') ->name('profile.update.password');
    });



     /* ======================================== ROTAS DE APREENSÕES ============================================ */

     Route::controller(SeizureController::class)->group(function(){
        Route::get('/seizure' , 'index')->name('seizure.index');
        Route::post('/seizure', 'store')->name('seizure.store');
    });



    /* ======================================== ROTAS DE ÊXITOS ================================================== */

    Route::controller(SuccessController::class)->group(function(){
        Route::get('/success',                'index') ->name('success.index');
        Route::post('/success',               'store') ->name('success.store');
        Route::get('/success/{success}/edit', 'edit')  ->name('success.edit');
        Route::put('/success/{success}',      'update')->name('success.update');
    });



    /* =================================== ROTAS DE PESQUISAS DE APREENSÕES =========================================== */

    Route::controller(SearchController::class)->group(function(){
        Route::get('/seizure/search',  'index') ->name('search.index');
        Route::post('/seizure/search', 'result')->name('search.result');
    });



    /* =================================== ROTAS DE ESTATÍSTICAS DE APREENSÕES =========================================== */

    Route::controller(StatisticController::class)->group(function(){
        Route::get('/statistic',          'index')         ->name('statistic.index');
        Route::post('/statistic/seizure', 'seizure_export')->name('statistic.seizure');
        Route::post('/statistic/success', 'success_export')->name('statistic.success');
    });



     /* =========================================== ROTAS ADMINISTRATIVO =================================================== */

     Route::controller(AdministrativeController::class)->group(function(){
        Route::get('/administrative',                       'index')           ->name('administrative.index');
        Route::get('/administrative/create',                'create')          ->name('administrative.create');
        Route::post('/administrative/create',               'store')           ->name('administrative.store');
        Route::post('/administrative/',                     'search')          ->name('administrative.search');
        Route::get('/administrative/{administrative}/edit', 'edit')            ->name('administrative.edit');
        Route::post('/administrative/{administrative}',     'update')          ->name('administrative.update');
        Route::get('/administrative/create',                'create')          ->name('administrative.create');
        Route::get('/movement/{administrative}/create',     'movement_create') ->name('administrative.movement_create');
        Route::post('/movement/{administrative}',           'movement_store')  ->name('administrative.movement_store');
        Route::get('/movement/confirm/{id}',                'movement_confirm')->name('administrative.movement_confirm');
        Route::get('/movement/delete/{id}',                 'movement_delete') ->name('administrative.movement_delete');
        Route::get('/acaution/{administrative}/create',     'acaution_create') ->name('administrative.acaution_create');
        Route::post('/acaution/{administrative}',           'acaution_store')  ->name('administrative.acaution_store');
        Route::get('/acaution/confirm/{id}',                'acaution_confirm')->name('administrative.acaution_confirm');
        Route::get('/acaution/delete/{id}',                 'acaution_delete') ->name('administrative.acaution_delete');
    });



    /* ==================================================== RELATÓRIOS ======================================================== */

    Route::controller(ReportController::class)->group(function(){
        Route::get('/report/administrative',                'administrative_index')     ->name('report.administrative.index');
        Route::get('/report/administrative/show/all',       'administrative_show_all')  ->name('report.administrative_show_all');
        Route::get('/report/administrative/show/inactives', 'administrative_inactives') ->name('report.administrative_inactives');
        Route::post('/report/administrative/sector',        'administrative_for_sector')->name('report.administrative_for_sector');
        Route::post('/report/administrative/search',        'administrative_search')    ->name('report.administrative_search');
        Route::get('/report/administrative/info/{id}',      'administrative_info')      ->name('report.administrative_info');
    });


});



require __DIR__.'/auth.php';

