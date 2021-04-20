<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersParentDetail;
use App\UserResidentialDetail;
use Illuminate\Support\Facades\Input;
use App\UserDetail;


class UserSearchController extends Controller
{

    function search(){
        global $q;
        $q = Input::get ( 'q' );
        if($q == ""){
            $users = UserDetail::with(['parent'])
            ->with('school')
            ->paginate (25);
            $data = [
                'query' => $q
            ];
            return view('welcome',array("data" => $data))->withUsers($users)->with($data);
        }

        else{
            $data = [
                'query' => $q
            ];

            $users = UserDetail::where ( 'first_name', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'email', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'last_name', 'LIKE', '%' . $q . '%' )
            ->orWhere ( DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'LIKE', '%' . $q . '%' )

            ->with(['parent'], function($query) use($q) {
                $query->where('parent_name', 'LIKE', '%' . $q . '%');
                $query->orWhere('parent_email', 'LIKE', '%' . $q . '%');
            })
            ->with(['school'], function($query) use($q) {
                $query->where('school_name', 'LIKE', '%' . $q . '%');
                $query->orWhere('school_equired', 'LIKE', '%' . $q . '%');
            })
            ->paginate (5)->setPath ('');
            

            $pagination = $users->appends (array(
            'q' => Input::get ('q') 
            ));
            
            if (count($users) > 0 )
                return view ('welcome', array("data" => $data))->withUsers ($users)->withQuery ($q)->with($data);
            }
            return view ('nodata')->withMessage ('No Details found. Try to search again!');
        }
}


