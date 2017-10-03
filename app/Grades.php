<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    public $rules = [
        'name' => 'required',
        'school_year' => 'required',
        'number_student' => 'required',
        'branch' => 'required',
        'user_id' => 'required',
        'status' => 'required',
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_DELETED = 3;
    public function students(){
        return $this->hasMany('App\Students','grade_id');
    }
    public function attendances(){
        return $this->hasMany('App\Attendances','grade_id');
    }
}
