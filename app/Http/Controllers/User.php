<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users_details;
use App\users_parent_details;
use App\school_details;
use App\residential_details;


class User extends Controller
{
    function save(Request $req){
        // print_r($req->input());
        $user = new users_details;
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->save();

        $user_parent = new users_parent_details;
        $user_parent->user_id = $user->id;
        $user_parent->parent_name = $req->parent_name;
        $user_parent->parent_email = $req->parent_email;
        $user_parent->parent_phone = $req->parent_phone;
        $user_parent->save();

        $school = new school_details;
        $school->user_id = $user->id;
        $school->school_name = $req->school_name;
        $school->school_equired = $req->school_equired;
        $school->save();

        $residential = new residential_details;
        $residential->user_id = $user->id;
        if($req->city == null || $req->city == ""){
            $residential->city = "";
        }else{
            $residential->city = $req->city;
        }
        if($req->state == null || $req->state == ""){
            $residential->state = "";
        }else{
            $residential->state = $req->state;
        }
        if($req->country == null || $req->country == ""){
            $residential->country = "";
        }else{
            $residential->country = $req->country;
        }
        
        $residential->save(); 

    }
}
