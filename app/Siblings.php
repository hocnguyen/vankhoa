<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siblings extends Model
{
    protected $fillable = [
        "full_name",
        "grade_year",
        "student_id",
        "created_at",
        "updated_at"
    ];

    public $rules = [

    ];

    public function student(){
        return $this->belongsTo('App\Students','student_id');
    }
    
}
