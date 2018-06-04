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
Route::get('admin/home', function () {
    return view('admin.index', ['message' => 'Home']);
})->name('admin.home');

Route::group(['prefix' => 'admin'], function() {

    Route::get('Liste-Documents',[
        'uses' => 'PostController@getview',
        'as' => 'admin.listedocuments'
    ]);

    Route::get('Ajout-Document',[
        'uses' => 'PostController@getCreatePost',
        'as' => 'admin.ajoutdocument',
        'middleware' => 'auth'
    ]);

    Route::post('Ajout-Document',[
        'uses' => 'PostController@upload',
        'as' => 'admin.ajoutdocument'
    ]);
    
    //Ajax route
    Route::get('modules/get/{id}', [
        'uses' => 'PostController@getModules',
    ]);

    //ansuprimiha db mora maghanhiyed doc details
    Route::get('Document-details/{id}',[
        'uses' => 'PostController@getDocDetails',
        'as' => 'admin.documentdetails',
        'middleware' => 'auth'
    ]);

    Route::get('display/{id}', [
        'uses' => 'PostController@getPDF',
        'as' => 'display'
    ]);

    Route::get('download/{id}', [
        'uses' => 'PostController@DownloadPDF',
        'as' => 'download'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'PostController@DeletePost',
        'as' => 'delete'
    ]);
    
    Route::get('update/{id}', [
        'uses' => 'PostController@UpdatePostview',
        'as' => 'update'
    ]);

    Route::post('update', [
        'uses' => 'PostController@UpdatePost',
        'as' => 'admin.update'
    ]);


});

Route::post('authentification', [
    'uses' => 'LoginController@signin',
    'as' => 'authentification',
    'middleware' => 'guest'
]);

Route::get('identification', [
    'uses' => 'IdentificationController@getview',
    'as' => 'identification',
]);

Route::post('edit', [
    'uses' => 'RegisterController@edit',
    'as' => 'edit'
]);

Route::get('identificationP', [
    'uses' => 'IdentificationController@getviewP',
    'as' => 'identificationP',
    'middleware' => 'guest'
]);

Route::post('register1', [
    'uses' => 'IdentificationController@getIdentification',
    'as' => 'verification',
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

Auth::routes();

