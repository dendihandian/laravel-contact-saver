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
    if (auth()->check()) {
      return redirect()->route('home');
    }
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'contacts'], function ( $route ) {
    $route->get('/', 'ContactController@index')->name('contacts.index');
    $route->get('/create', 'ContactController@create')->name('contacts.create');
    $route->post('/create', 'ContactController@store')->name('contacts.store');

    $route->group(['prefix' => '{contact}'], function ( $route ) {
        $route->get('/', 'ContactController@show')->name('contacts.show');
        $route->get('/edit', 'ContactController@edit')->name('contacts.edit');
        $route->post('/edit', 'ContactController@update')->name('contacts.update');
        $route->post('/delete', 'ContactController@destroy')->name('contacts.destroy');
    });
});

Auth::routes();
