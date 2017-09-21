<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    public function att(){
        return $this->hasMany('App\Attendances','student_id');
    }

    public function grade(){
        return $this->belongsTo('App\Grades', 'grade_id');
    }
}
