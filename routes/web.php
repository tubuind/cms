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
Route::get('/language/set', 'Guest\LanguagesController@set')->name('guest.language.set');

//Group router admin
Route::group(['prefix'=>'/admin', 'middleware'=>['auth'] ], function(){

    //Dashboard
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard.index');

    //User
    Route::get('/user', 'Admin\UserController@index')->name('admin.user.index');

    //User
    Route::get('/permission', 'Admin\PermissionController@index')->name('admin.permission.index');
    Route::get('/permission/create', 'Admin\PermissionController@create')->name('admin.permission.create');
    Route::post('/permission/create', 'Admin\PermissionController@store')->name('admin.permission.store');

});
