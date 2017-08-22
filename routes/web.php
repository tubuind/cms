<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

//Language
Route::get('/language/set', 'Guest\LanguagesController@set')->name('guest.language.set');

Route::group(['prefix'=>'/admin', 'middleware'=>['auth'] ], function(){

    //Dashboard
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard.index');

    //User
    Route::get('/user', 'Admin\UserController@index')->name('admin.user.index');

});
