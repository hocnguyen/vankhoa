<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        "first_name",
        "last_name",
        "middle_name",
        "name_at_school",
        "vns",
        "birthday",
        "gender",
        "student_type",
        "sickness",
        "medicare_no",
        "home_address",
        "home_phone",
        "phone",
        "school_name",
        "school_address",
        "campus",
        "year_level_in_day_school",
        "is_over_seas_student",
        "is_temporary_visa",
        "is_vsl",
        "address_vsl",
        "branch",
        "mom_name",
        "dad_name",
        "mom_phone",
        "dad_phone",
        "dad_email",
        "mom_email",
        "guardian_name",
        "relation",
        "guardian_phone",
        "date",
        "invoice_no",
        "grade_id",
        "created_at",
        "updated_at"
    ];

    public $rules = [
        'first_name' => 'required',
        "last_name" => 'required',
        "middle_name" => 'required',
        "name_at_school" => 'required',
        "vns" => 'required',
        "birthday" => 'required',
        "gender" => 'required',
        "student_type" => 'required',
        "sickness" => 'required',
        "medicare_no" => 'required',
        "home_address" => 'required',
        "home_phone" => 'required',
        "phone" => 'required',
        "school_name" => 'required',
        "school_address" => 'required',
        "campus" => 'required',
        "year_level_in_day_school" => 'required',
        "is_over_seas_student" => 'required',
        "is_temporary_visa" => 'required',
        "is_vsl" => 'required',
        "branch" => 'required',
        "mom_name" => 'required',
        "dad_name" => 'required',
        "mom_phone" => 'required',
        "dad_phone" => 'required',
        "dad_email" => 'required',
        "mom_email" => 'required',
        "guardian_name" => 'required',
        "relation" => 'required',
        "guardian_phone" => 'required',
        "date" => 'required',
        "invoice_no",
        "grade_id" => "required",
        "created_at",
        "updated_at"
    ];

    public function att(){
        return $this->hasMany('App\Attendances','student_id');
    }

    public function grade(){
        return $this->belongsTo('App\Grades', 'grade_id');
    }
}
