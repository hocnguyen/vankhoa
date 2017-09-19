<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    public function student(){
        return $this->belongsTo('App\Students', 'student_id');
    }

    const STATUS_EMPTY = 1;
    const STATUS_HAVING = 2;
    const STATUS_NO_HAVING = 3;
}
