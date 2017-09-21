<?php

namespace App\Http\Controllers;

use App\Students;

use App\Http\Requests;

class StudentController extends Controller
{
    public function attendances($grade){
        $students = Students::with('grade')->where('grade_id', $grade)->orderBy('id', 'DESC')->paginate(10);
        return view('student.attendances', ['students' => $students, 'grade' => $grade]);
    }

    public function create(){
        $model = new Students();
        return view('student.form', ['model' => $model]);
    }
}
