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

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::group(['middleware' => 'auth'], function() {
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function(){
        Route::resource('jobs', 'admin\JobController')->except(['show']);
        Route::group(['prefix' => 'applications', 'as' => 'applications.'], function() {
            Route::get('/{job}', 'admin\ApplicationController@index')->name('index');
            Route::get('/accept/{application}', 'admin\ApplicationController@accept')->name('accept');
        });
    });
    Route::group(['middleware' => 'user'], function(){
        Route::get('jobs', 'user\JobController@index')->name('jobs');
        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function() {
            Route::get('/', 'user\ProfileController@index')->name('index');
            Route::get('/edit', 'user\ProfileController@edit')->name('edit');
            Route::put('/update', 'user\ProfileController@update')->name('update');
        });
        Route::resource('certifications', 'user\CertificationController')->except(['show']);
        Route::group(['prefix' => 'applications', 'as' => 'applications.'], function() {
            Route::get('/', 'user\ApplicationController@index')->name('index');
            Route::get('/apply/{job}', 'user\ApplicationController@apply')->name('apply');
        });
    });
});
