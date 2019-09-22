<?php

// Home Routes
Route::prefix('/')->namespace('Web\Home')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('department')->group(function () {
    	Route::get('/', 'DepartmentController@index');
    });

    Route::prefix('project')->group(function () {
    	Route::get('/', 'ProjectController@index');
    });

    
    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
