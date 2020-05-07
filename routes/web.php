<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {

        /**
         * Routes Plan x Modulos
         */
        Route::get('plans/{id}/modules/{idmodules}/detach', 'ACL\PlanModuleController@detachPlanModule')->name('plans.modules.detach');
        Route::post('plans/{id}/modules', 'ACL\PlanModuleController@attachmodulesplan')->name('plans.modules.attach');
        Route::any('plans/{id}/modules/create', 'ACL\PlanModuleController@modulesAvailable')->name('plans.modules.available');
        Route::get('plans/{id}/modules', 'ACL\PlanModuleController@modules')->name('plans.modules');
        Route::get('modules/{id}/plans', 'ACL\PlanModuleController@plans')->name('modules.plans');
        /**
         * Routes Permissões x Modulos
         */
        Route::get('modules/{id}/permissions/{idPermission}/detach', 'ACL\PermissionModuleController@detachpermissionModule')->name('modules.permission.detach');
        Route::post('modules/{id}/permissions', 'ACL\PermissionModuleController@attachpermissionsModule')->name('modules.permissions.attach');
        Route::any('modules/{id}/permissions/create', 'ACL\PermissionModuleController@permissionsAvailable')->name('modules.permissions.available');
        Route::get('modules/{id}/permissions', 'ACL\PermissionModuleController@permissions')->name('modules.permissions');
        Route::get('permission/{id}/modules', 'ACL\PermissionModuleController@modules')->name('permissions.modules');
        /**
         * Routes Permissões
         */
        Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
        Route::resource('permissions', 'ACL\PermissionController');

        /**
         * Routes Modulos
         */
        Route::any('modules/search', 'ACL\ModuleController@search')->name('modules.search');
        Route::resource('modules', 'ACL\ModuleController');

        /**
         * Routes Detalhes do Plano
         */

        Route::resource('details.plan', 'DetailPlanController');

        /* Substitui todas por apenas Route::resource('details.plan', 'DetailPlanController');
        Route::delete('plan/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
        Route::get('plan/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
        Route::put('plan/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
        Route::get('plan/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
        Route::post('plan/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
        Route::get('plan/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
        Route::get('plan/{url}/details', 'DetailPlanController@index')->name('details.plan.index');
        */

        /**
         * Routes Plans
         */
        Route::any('plans/search', 'PlanController@search')->name('plans.search');
        Route::resource('plans', 'PlanController');

        /**
         * Home Dashboard
         */
        Route::get('/', 'PlanController@index')->name('admin.index');
    });

/**
 *  Site
 */
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');

/**
 * Rotas de autenticação
 */
//Auth::routes(['register'=>false]); // desabilita o registo
Auth::routes();
