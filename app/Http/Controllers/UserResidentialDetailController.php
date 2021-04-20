<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserResidentialDetail;



class UserResidentialDetailController extends Controller
{

    function save($req, $user){
        $residential = new UserResidentialDetail;
        $residential->user_id = $user->id;
        if($req->city == null || $req->city == "")
        {
            $residential->city = "";
        }
        else
        {
            $residential->city = $req->city;
        }
        if($req->state == null || $req->state == "")
        {
            $residential->state = "";
        }
        else
        {
            $residential->state = $req->state;
        }
        if($req->country == null || $req->country == "")
        {
            $residential->country = "";
        }
        else
        {
            $residential->country = $req->country;
        }
        $residential->save();
    }

}

