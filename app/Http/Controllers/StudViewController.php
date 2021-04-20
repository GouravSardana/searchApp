<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudViewController extends Controller {

public function index(){
        $users_details = DB::table('users_details')
        ->join('users_parent_details', 'users_parent_details.user_id', '=', 'users_details.id')->paginate(15);

        return view('welcome',['users_details'=>$users_details]);
    }
}
