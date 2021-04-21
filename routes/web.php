<?php

use Illuminate\Support\Facades\Input;
use App\UserDetail;

Route::view('form','userview');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('view-records','StudViewController@index');
Route::any('search', 'UserSearchController@search')->middleware('auth');

Route::post('submit','User@save');

