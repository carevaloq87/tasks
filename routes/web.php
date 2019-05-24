<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'users',
], function () {
    Route::get('/', 'UsersController@index')
         ->name('users.users.index');
    Route::get('/create','UsersController@create')
         ->name('users.users.create');
    Route::get('/show/{users}','UsersController@show')
         ->name('users.users.show');
    Route::get('/{users}/edit','UsersController@edit')
         ->name('users.users.edit');
    Route::post('/', 'UsersController@store')
         ->name('users.users.store');
    Route::put('users/{users}', 'UsersController@update')
         ->name('users.users.update');
    Route::delete('/users/{users}','UsersController@destroy')
         ->name('users.users.destroy');
});

Route::group([
    'prefix' => 'dutties',
], function () {
    Route::get('/', 'DuttiesController@index')
         ->name('dutties.dutties.index');
    Route::get('/create','DuttiesController@create')
         ->name('dutties.dutties.create');
    Route::get('/show/{dutties}','DuttiesController@show')
         ->name('dutties.dutties.show');
    Route::get('/{dutties}/edit','DuttiesController@edit')
         ->name('dutties.dutties.edit');
    Route::post('/', 'DuttiesController@store')
         ->name('dutties.dutties.store');
    Route::put('dutties/{dutties}', 'DuttiesController@update')
         ->name('dutties.dutties.update');
    Route::delete('/dutties/{dutties}','DuttiesController@destroy')
         ->name('dutties.dutties.destroy');
});

Route::group([
    'prefix' => 'homes',
], function () {
    Route::get('/', 'HomesController@index')
         ->name('homes.homes.index');
    Route::get('/create','HomesController@create')
         ->name('homes.homes.create');
    Route::get('/show/{homes}','HomesController@show')
         ->name('homes.homes.show');
    Route::get('/{homes}/edit','HomesController@edit')
         ->name('homes.homes.edit');
    Route::post('/', 'HomesController@store')
         ->name('homes.homes.store');
    Route::put('homes/{homes}', 'HomesController@update')
         ->name('homes.homes.update');
    Route::delete('/homes/{homes}','HomesController@destroy')
         ->name('homes.homes.destroy');
});

Route::group([
    'prefix' => 'schedules',
], function () {
    Route::get('/', 'SchedulesController@index')
         ->name('schedules.schedules.index');
    Route::get('/create','SchedulesController@create')
         ->name('schedules.schedules.create');
    Route::get('/show/{schedules}','SchedulesController@show')
         ->name('schedules.schedules.show');
    Route::get('/{schedules}/edit','SchedulesController@edit')
         ->name('schedules.schedules.edit');
    Route::post('/', 'SchedulesController@store')
         ->name('schedules.schedules.store');
    Route::put('schedules/{schedules}', 'SchedulesController@update')
         ->name('schedules.schedules.update');
    Route::delete('/schedules/{schedules}','SchedulesController@destroy')
         ->name('schedules.schedules.destroy');
});

Route::group([
    'prefix' => 'tasks',
], function () {
    Route::get('/', 'TasksController@index')
         ->name('tasks.tasks.index');
    Route::get('/create','TasksController@create')
         ->name('tasks.tasks.create');
    Route::get('/show/{tasks}','TasksController@show')
         ->name('tasks.tasks.show');
    Route::get('/{tasks}/edit','TasksController@edit')
         ->name('tasks.tasks.edit');
    Route::post('/', 'TasksController@store')
         ->name('tasks.tasks.store');
    Route::put('tasks/{tasks}', 'TasksController@update')
         ->name('tasks.tasks.update');
    Route::delete('/tasks/{tasks}','TasksController@destroy')
         ->name('tasks.tasks.destroy');
});
