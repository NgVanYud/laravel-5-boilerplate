<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController');

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_route_files(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admod'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    include_route_files(__DIR__.'/backend/');
});

//Route::group(['namespace' => 'Backend', 'prefix' => 'post'], function() {
//   Route::get('add', [
//       'as' => 'backend.post.add',
//       'uses' => 'PostController@add'
//   ]);
//});

/*
 * Category
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'category', 'middleware' => 'admod'], function() {
   Route::get('all', [
      'as' => 'backend.category.index',
       'uses' => 'CategoryController@index'
   ]);

   Route::get('create', [
      'as' => 'backend.category.create',
      'uses' => 'CategoryController@create'
   ]);

    Route::post('store', [
        'as' => 'backend.category.store',
        'uses' => 'CategoryController@store'
    ]);

    Route::get('edit/{slug}', [
        'as' => 'backend.category.edit',
        'uses' => 'CategoryController@edit'
    ]);

    Route::post('update/{slug}', [
       'as' => 'backend.category.update',
       'uses' => 'CategoryController@update'
    ]);

    Route::post ('delete/{slug}', [
        'as' => 'backend.category.destroy',
        'uses' => 'CategoryController@destroy'
    ]);

    Route::get('status/{slug}', [
        'as' => 'backend.category.status',
        'uses' => 'CategoryController@changeStatus'
    ]);

});
/**
 * Post
 */

Route::group(['namespace' => 'Backend', 'prefix' => 'backend/post', 'middleware' => 'admod'], function() {
    Route::get('all', [
        'as' => 'backend.post.index',
        'uses' => 'PostController@index'
    ]);

    Route::get('create', [
        'as' => 'backend.post.create',
        'uses' => 'PostController@create'
    ]);

    Route::post('store', [
        'as' => 'backend.post.store',
        'uses' => 'PostController@store'
    ]);

    Route::get('edit/{slug}', [
        'as' => 'backend.post.edit',
        'uses' => 'PostController@edit'
    ]);

    Route::post('update/{slug}', [
        'as' => 'backend.post.update',
        'uses' => 'PostController@update'
    ]);

    Route::post ('delete/{slug}', [
        'as' => 'backend.post.destroy',
        'uses' => 'PostController@destroy'
    ]);

    Route::get('status/{slug}', [
        'as' => 'backend.post.status',
        'uses' => 'PostController@changeStatus'
    ]);

});

//frontend
Route::group(['namespace' => 'Frontend', 'prefix' => 'frontend/post', 'middleware' => 'author'], function() {
    Route::get('all', [
        'as' => 'frontend.post.index',
        'uses' => 'PostController@index'
    ]);

    Route::get('create', [
        'as' => 'frontend.post.create',
        'uses' => 'PostController@create'
    ]);

//    Route::post('store', [
//        'as' => 'frontend.post.store',
//        'uses' => 'PostController@store'
//    ]);
//
//    Route::get('edit/{slug}', [
//        'as' => 'frontend.post.edit',
//        'uses' => 'PostController@edit'
//    ]);
//
//    Route::post('update/{slug}', [
//        'as' => 'frontend.post.update',
//        'uses' => 'PostController@update'
//    ]);
//
//    Route::post ('delete/{slug}', [
//        'as' => 'frontend.post.destroy',
//        'uses' => 'PostController@destroy'
//    ]);
//
//    Route::get('status/{slug}', [
//        'as' => 'frontend.post.status',
//        'uses' => 'PostController@changeStatus'
//    ]);

});
