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
    global $q;
    $q = Input::get ( 'q' );
    if($q == ""){
        $users = users_details::with(['parent'])
        ->with('school')
        ->paginate (25);
        return view('welcome')->withUsers($users);
    }


    if($q != ""){
        $users = users_details::where ( 'first_name', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'email', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'last_name', 'LIKE', '%' . $q . '%' )
        ->with(['parent'], function($query) use($q) {
            $query->where('parent_name', 'LIKE', '%' . $q . '%');
            $query->orWhere('parent_email', 'LIKE', '%' . $q . '%');
        })
        ->with(['school'], function($query) use($q) {
            $query->where('school_name', 'LIKE', '%' . $q . '%');
            $query->orWhere('school_equired', 'LIKE', '%' . $q . '%');
        })
        ->paginate (5)->setPath ( '' );
        

        $pagination = $users->appends ( array (
        'q' => Input::get ( 'q' ) 
        ) );

        if (count ( $users ) > 0 )
            // dd($users);
            return view ( 'welcome' )->withUsers ( $users )->withQuery ( $q );
        }
        // dd($users);
        return view ( 'nodata' )->withMessage ( 'No Details found. Try to search again !' );
    } );
