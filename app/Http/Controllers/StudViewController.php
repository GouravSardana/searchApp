<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudViewController extends Controller {

public function index(){
        // DB::table('entries')
        // ->join('articles', 'entries.id', '=', 'articles.entryID')
        // ->orderBy('articles.created_at', 'desc')
        // ->select('articles.*')
        // ->paginate(15);
        // $users_details = DB::select('SELECT * FROM `users_details` JOIN users_parent_details on users_parent_details.user_id = users_details.id join school_details on school_details.user_id = users_details.id JOIN residential_details on residential_details.user_id = users_details.id')
        // ;
        $users_details = DB::table('users_details')
        ->join('users_parent_details', 'users_parent_details.user_id', '=', 'users_details.id')->paginate(15);
        // dd($users_details);
        // return view('welcome')->withUsers($users_details);
        return view('welcome',['users_details'=>$users_details]);
    }
}
