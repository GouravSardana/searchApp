<?php

use Illuminate\Support\Facades\Input;
use App\users_details;

Route::get('/', function () {
    $users = users_details::paginate(25);
    return view('welcome')->withUsers($users);
});



Route::get('view-records','StudViewController@index');
Route::view('form','userview');
Route::post('submit','User@save');

Route::any ( '/search', function () {
    
    $q = Input::get ( 'q' );
    if($q == ""){
        $users = DB::table('users_details')
        ->join('users_parent_details', 'users_parent_details.user_id', '=', 'users_details.id')->paginate(25);
        return view('welcome')->withUsers($users);
    }
    if($q != ""){
    $users = users_details::where ( 'first_name', 'LIKE', '%' . $q . '%' )
    ->orWhere ( 'email', 'LIKE', '%' . $q . '%' )
    
    ->with(['parentDetails' => function($query) {
        $query->selectRaw('parent_name, parent_email');
    }])
    
    ->orWhere ( 'parent_name', 'LIKE', '%' . $q . '%' )
    
    ->paginate (5)->setPath ( '' );
    
    
    $pagination = $users->appends ( array (
       'q' => Input::get ( 'q' ) 
     ) );
    if (count ( $users ) > 0)
     return view ( 'welcome' )->withUsers ( $users )->withQuery ( $q );
    }
     return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
   } );
