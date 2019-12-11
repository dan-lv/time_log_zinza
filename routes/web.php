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
    return view('user.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'User',
    'middleware' => 'auth',
], function() {
    Route::resource('check-ins', 'CheckInController')->only('store');
    Route::resource('check-outs', 'CheckOutController')->only('store');
    Route::resource('absents', 'AbsentController')->only(['index', 'create', 'store']);
    Route::resource('timelogs', 'TimeLogController')->only('index');
    Route::resource('profiles', 'ProfileController')->only('show', 'update');
    Route::post('/profiles/upload-avatar', 'ProfileController@storeAvatar')->name('profiles.avatar');
});

Route::group([
    'prefix' => 'manage',
    'namespace' => 'Admin',
    'middleware' => 'manage',
], function() {
    Route::resource('ad-absents', 'ManageAbsentController')->except('show');
    Route::get('ad-absents/user/{userId}', 'ManageAbsentController@absentOfUser')->name('ad-absents.absent_user');
    Route::get('ad-absents/processing', 'ManageAbsentController@absentProcessing')->name('ad-absents.processing');
    Route::patch('ad-absents/status/{absent}', 'ManageAbsentController@confirm')->name('ad-absents.confirm');
});
