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

Route::group(['prefix' => 'admin'], function() {

    Route::get('home',[
        'uses' => 'IndexController@getview',
        'as' => 'admin.home',
        'middleware' => 'auth'
    ]);
    Route::get('Liste-Documents',[
        'uses' => 'PostController@getview',
        'as' => 'admin.listedocuments',
        'middleware' => 'auth'
        ]);

    Route::get('Ajout-Document',[
        'uses' => 'PostController@getCreatePost',
        'as' => 'admin.ajoutdocument',
        'middleware' => 'auth'
    ]);

    Route::post('Ajout-Document',[
        'uses' => 'PostController@upload',
        'as' => 'admin.ajoutdocument',
        'middleware' => 'auth'
    ]);
    
    //Ajax route
    Route::get('modules/get/{id}', [
        'uses' => 'PostController@getModules',
        'middleware' => 'auth'
    ]);

    //Ajax route for update
    Route::get('/modules/get/update/{id}', [
        'uses' => 'PostController@getModulesUpd',
        'middleware' => 'auth'
    ]);

    //ansuprimiha db mora maghanhiyed doc details
    Route::get('Document-details/{id}',[
        'uses' => 'PostController@getDocDetails',
        'as' => 'admin.documentdetails',
        'middleware' => 'auth'
    ]);

    //Search doc prof
    Route::get('search',[
        'uses' => 'PostController@coursesSearch',
        'as' => 'admin.search',
        'middleware' => 'auth'
    ]);

    //Search posts by studyarea
    Route::get('searchS',[
        'uses' => 'PostController@coursesSearchS',
        'as' => 'admin.searchS',
        'middleware' => 'auth'
    ]);

    Route::get('display/{id}', [
        'uses' => 'PostController@getPDF',
        'as' => 'display',
        'middleware' => 'auth'
    ]);

    Route::get('download/{id}', [
        'uses' => 'PostController@DownloadPDF',
        'as' => 'download',
        'middleware' => 'auth'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'PostController@DeletePost',
        'as' => 'delete',
        'middleware' => 'auth'
    ]);
    
    Route::get('update/{id}', [
        'uses' => 'PostController@UpdatePostview',
        'as' => 'update',
        'middleware' => 'auth'
    ]);

    Route::post('update', [
        'uses' => 'PostController@UpdatePost',
        'as' => 'admin.update',
        'middleware' => 'auth'
    ]);

    Route::get('studyarea/{studyarea}', [
        'uses' => 'PostController@getStudyareaModls',
        'as' => 'studyarea',
        'middleware' => 'auth'
    ]);

    Route::get('studyarea', [
        'uses' => 'StudyareaController@viewaddStudyarea',
        'as' => 'admin.addStudy',
        'middleware' => 'auth'
    ]);

    Route::post('studyarea', [
        'uses' => 'StudyareaController@addStudyarea',
        'as' => 'admin.addStudy',
        'middleware' => 'auth'
    ]);

    Route::post('module', [
        'uses' => 'ModuleController@addModule',
        'as' => 'admin.addModule',
        'middleware' => 'auth'
    ]);

});

//USER :: 

Route::group(['prefix' => 'user'], function() {
    
    Route::get('index/{id}',[
        'uses' => 'PostController@getviewUser',
        'as' => 'user.index'
    ]);

    Route::get('modules',[
        'uses' => 'ModuleController@getUserModules',
        'as' => 'user.modules'
    ]);

    //Search doc prof
    Route::get('search',[
        'uses' => 'PostController@coursesSearchUser',
        'as' => 'user.search'
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

