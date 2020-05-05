<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function(){

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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
