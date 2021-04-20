<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;
use App\UsersParentDetail;
use App\UserSchoolDetail;
use App\UserResidentialDetail;
use App\Http\Controllers\UsersParentDetailController;

class User extends Controller
{
    function save(Request $req){
        $user = new UserDetail;
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->save();

        $usersParentDetailController = new UsersParentDetailController();
        $usersParentDetailController->save($req, $user);

        $userSchoolDetailController = new UserSchoolDetailController();
        $userSchoolDetailController->save($req, $user);

        $userResidentialDetailController = new UserResidentialDetailController();
        $userResidentialDetailController->save($req, save);
    }
}
