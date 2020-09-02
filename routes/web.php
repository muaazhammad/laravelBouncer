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

Route::get('/unauthorized', function () {
    return view('unauthorized');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'postControllesr@index');

//authorization with laravel builtin 'can' middleware
Route::get('/posts/create', 'postControllesr@create')->middleware('can:create');
Route::get('/posts/{id}/edit', 'postControllesr@edit')->middleware('can:edit');
Route::delete('/posts/{id}/delete', 'postControllesr@destroy')->middleware('can:delete');


//authorization with my middleware (abilityMiddleware)
//Route::get('/posts/create', 'postControllesr@create')->middleware('abilityMiddleware:create');
//Route::get('/posts/{id}/edit', 'postControllesr@edit')->middleware('abilityMiddleware:edit');
//Route::delete('/posts/{id}/delete', 'postControllesr@destroy')->middleware('abilityMiddleware:delete');















