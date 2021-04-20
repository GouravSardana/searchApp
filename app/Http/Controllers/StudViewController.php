<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudViewController extends Controller {

public function index(){
        $UserDetail = DB::table('UserDetail')
        ->join('UserParentDetail', 'UserParentDetail.user_id', '=', 'UserDetail.id')->paginate(15);

        return view('welcome',['UserDetail'=>$UserDetail]);
    }
}
