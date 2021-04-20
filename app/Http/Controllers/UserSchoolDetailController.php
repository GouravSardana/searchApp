<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSchoolDetail;



class UserSchoolDetailController extends Controller
{

    function save($req, $user){
        $school = new UserSchoolDetail;
        $school->user_id = $user->id;
        $school->school_name = $req->school_name;
        $school->school_equired = $req->school_equired;
        $school->save();
    }

}





