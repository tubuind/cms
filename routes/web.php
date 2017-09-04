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

//Wellcome
Route::get('/', function () {
    return view('welcome');
});

//Language
Route::get('/language/set', 'Guest\LanguagesController@set')->name('language.set');

//Common
Route::get('/error', 'Common\CommonController@error')->name('common.error');
Route::get('/youtube/login', 'Common\CommonController@loginYoutube')->name('common.login_youtube');

//Group router admin
Route::group(['prefix'=>'/admin', 'middleware'=>['auth', 'bindings', 'auth.youtube'] ], function(){

    //Dashboard
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard.index');

    //User
    Route::resource('user', 'Admin\UserController');

    //Permission
    Route::resource('permission', 'Admin\PermissionController', [
        'except' => ['show'],
    ]);

    //Role
    Route::resource('role', 'Admin\RoleController', [
        'except' => ['show'],
    ]);

});
