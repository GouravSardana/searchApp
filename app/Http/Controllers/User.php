<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;
use App\UserParentDetail;
use App\UserSchoolDetail;
use App\UserResidentialDetail;
use App\Http\Controllers\UserParentDetailController;

class User extends Controller
{
    function save(Request $req){

        // validation
        $req->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'parent_name' => 'required',
            'parent_email' => 'required',
            'parent_phone' => 'required'

        ]);

        // request is valid
        $user = new UserDetail;
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->save();

        $userParentDetailController = new UserParentDetailController();
        $userParentDetailController->save($req, $user);

        $userSchoolDetailController = new UserSchoolDetailController();
        $userSchoolDetailController->save($req, $user);

        $userResidentialDetailController = new UserResidentialDetailController();
        $userResidentialDetailController->save($req, $user);

        return $user;
    }
}
