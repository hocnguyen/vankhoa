<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    public function student(){
        return $this->belongsTo('App\Students', 'student_id');
    }
}
