<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_details extends Model
{
    protected $table = "users_details";
    public $timestamps= false;

    public function parentDetails(){
        return $this->hasMany('App\users_parent_details', 'user_id', 'id');
    }

    public function parent(){
        return $this->hasOne('App\users_parent_details', 'user_id', 'id');
    }

    public function school(){
        return $this->hasOne('App\school_details', 'user_id', 'id');
    }

}
// ->with(['student' => function($query) {
//     $query->selectRaw('user_detail_id, firstName, surname, image_240 as image, inv_parent');
// }])