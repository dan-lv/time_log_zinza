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
    Route::resource('profiles', 'ProfileController')->only('show', 'update')->middleware('authorize.profile');
    Route::post('/profiles/upload-avatar', 'ProfileController@storeAvatar')->name('profiles.avatar');
});

Route::namespace('Admin')
->name('manage.')
->middleware('manage')
->prefix('manage')
->group(function() {
    Route::resource('absents', 'ManageAbsentController')->except('show');
    Route::get('absents/user/{userId}', 'ManageAbsentController@absentOfUser')->name('absents.absent_user');
    Route::get('absents/processing', 'ManageAbsentController@processingAbsents')->name('absents.processing');
    Route::patch('absents/status/{absent}', 'ManageAbsentController@confirm')->name('absents.confirm');
});
