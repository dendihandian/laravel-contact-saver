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
Route::group(['prefix' => 'contacts', 'middleware' => 'auth'], function ( $route ) {
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

Route::group(['prefix' => 'groups', 'middleware' => 'auth'], function ( $route ) {
    $route->get('/', 'GroupController@index')->name('groups.index');
    // $route->get('/create', 'GroupController@create')->name('groups.create');

    $route->group(['prefix' => '{group}'], function ( $route ) {
        $route->get('/', 'GroupController@show')->name('groups.show');
        // $route->get('/edit', 'GroupController@edit')->name('groups.edit');
        // $route->post('/edit', 'GroupController@update')->name('groups.update');
        // $route->post('/delete', 'GroupController@destroy')->name('groups.destroy');
    });
});

Auth::routes();
