<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = "UserDetail";
    public $timestamps= false;

    public function parentDetails(){
        return $this->hasMany('App\UsersParentDetail', 'user_id', 'id');
    }

    public function parent(){
        return $this->hasOne('App\UsersParentDetail', 'user_id', 'id');
    }

    public function school(){
        return $this->hasOne('App\UserSchoolDetail', 'user_id', 'id');
    }

}