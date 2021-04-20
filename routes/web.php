<?php

use Illuminate\Support\Facades\Input;
use App\UserDetail;

Route::get('view-records','StudViewController@index');
Route::view('form','userview');
Route::post('submit','User@save');

Route::any ( 'search', 'UserSearchController@search');
