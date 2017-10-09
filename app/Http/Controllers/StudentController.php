<?php

namespace App\Http\Controllers;

use App\Grades;
use App\Students;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function attendances(){
        $grades = Grades::where('user_id', Auth::User()->id)->get();
        return view('student.attendances',['grades' => $grades]);
    }

    public function getAttendance(){
        if(isset($_GET['grade']) && trim($_GET['grade']) != '' && isset($_GET['time']) && trim($_GET['time']) != '') {
            $grade = trim($_GET['grade']);
            $time = trim($_GET['time']);
            $students = Students::with('grade')->where('grade_id', $grade)->orderBy('id', 'DESC')->paginate(10);
            return view('student.attendance', ['students' => $students, 'grade' => $grade, 'time' => $time]);
        }else{
            return redirect("/error");
        }
    }

    public function enrolment(){
        $current_year = date("Y");
        $model = new Students();
        $grade = Grades::whereRaw('school_year = '.$current_year." and status = 1")->get();
        return view('student.form', ['model' => $model,'grade'=>$grade]);
    }

    public function add(Request $request){
        $model = new Students();
        print_r($request->last_name); exit;
        $this->validate($request, $model->rules);

        /*if (Students::create($request->all())) {
            return redirect("/students");
        }*/
    }
}
