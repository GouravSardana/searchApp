<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserParentDetail;
use App\UserResidentialDetail;


class UserParentDetailController extends Controller
{

    function save($req, $user){
        $user_parent = new UserParentDetail;
        $user_parent->user_id = $user->id;
        $user_parent->parent_name = $req->parent_name;
        $user_parent->parent_email = $req->parent_email;
        $user_parent->parent_phone = $req->parent_phone;
        $user_parent->save();
    }
}





