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
    return view('admin.index', ['message' => 'Home']);
})->name('first.index');

Route::get('identification', [
    'uses' => 'IdentificationController@getview',
    'as' => 'identification',
    'middleware' => 'guest'
]);

Route::post('register1', [
    'uses' => 'IdentificationController@getIdentification',
    'as' => 'verification',
    'middleware' => 'guest'
]);

Route::get('identificationP', [
    'uses' => 'IdentificationController@getviewP',
    'as' => 'identificationP',
    'middleware' => 'guest'
]);

Route::post('register2', [
    'uses' => 'IdentificationController@getIdentificationP',
    'as' => 'verificationP',
    'middleware' => 'guest'
]);

Route::post('edit', [
    'uses' => 'RegisterController@edit',
    'as' => 'edit'
]);

Route::group(['prefix' => 'admin'], function() {

    /* Route::get('create', [
        'uses' => 'PostController@getAdminCreate',
        'as' => 'admin.create'
    ]); */

    Route::get('Liste-Courses',[
        'uses' => 'PostController@getview',
        'as' => 'admin.listecourses'
    ]);

});

Auth::routes();

