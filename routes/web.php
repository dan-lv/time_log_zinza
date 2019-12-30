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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'User',
    'middleware' => 'auth',
], function() {
    Route::get('/', function () {
        return view('user.home');
    });
    Route::resource('check-ins', 'CheckInController')->only('store');
    Route::resource('check-outs', 'CheckOutController')->only('store');
    Route::resource('absents', 'AbsentController')->only(['index', 'create', 'store']);
    Route::resource('timelogs', 'TimeLogController')->only('index');
    Route::get('timelogs/export', 'TimeLogController@export')->name('timelogs.export');
    Route::resource('profiles', 'ProfileController')->only(['show', 'update'])->middleware('authorize.profile');
    Route::post('/profiles/upload-avatar', 'ProfileController@storeAvatar')->name('profiles.avatar');
    Route::get('absents/export', 'AbsentController@export')->name('absents.export');
});

Route::namespace('Admin')
->name('manage.')
->middleware('manage')
->prefix('manage')
->group(function() {
    Route::resource('absents', 'ManageAbsentController')->except('show');
    Route::resource('users.absents', 'UserAbsentController')->only('index');
    Route::get('absents/processing', 'ManageAbsentController@processingAbsents')->name('absents.processing');
    Route::patch('absents/status/{absent}', 'ManageAbsentController@confirm')->name('absents.confirm');
    Route::resource('timelogs', 'ManageTimeLogController')->except(['destroy', 'show']);
    Route::resource('users.timelogs', 'UserTimeLogController')->only('index');
    Route::get('timelogs/export', 'ManageTimeLogController@export')->name('timelogs.export');
    Route::resource('users', 'ManageUserController')->only(['index', 'destroy']);
    Route::get('users/{userId}/absents/export', 'UserAbsentController@export')->name('users.absents.export');
    Route::get('absents/export', 'ManageAbsentController@export')->name('absents.export');
    Route::resource('log-profiles', 'ProfileLogController')->only('index');
});
