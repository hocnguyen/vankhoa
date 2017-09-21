<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    public function stu(){
        return $this->hasMany('App\Students','grade_id');
    }
}
