<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1/admin'], function(){
    Route::post('/user/list', 'Common\PaginationController@list')->name('api.admin.user.list');
    Route::post('/permission/list', 'Common\PaginationController@list')->name('api.admin.permission.list');
    Route::post('/role/list', 'Common\PaginationController@list')->name('api.admin.role.list');
});
