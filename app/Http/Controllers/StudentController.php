<?php

namespace App\Http\Controllers;

use App\Grades;
use App\Siblings;
use App\Students;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public  function index(){
        //$student = Students::where('id', '>', 0)->orderBy('id', 'DESC')->paginate(10);
        $student = DB::table('students')
            ->join('grades', 'students.grade_id', '=', 'grades.id')
            ->select('students.*', 'grades.name')
            ->get();
        return view("student.index",["data"=> $student]);
    }

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
        $sibling = new Siblings();
        $grade = Grades::whereRaw('school_year = '.$current_year." and status = 1")->get();
        return view('student.form', ['model' => $model,'grade'=>$grade,"sibling" =>$sibling]);
    }

    public function add(Request $request){
        $model = new Students();
        $this->validate($request, $model->rules);
        $model->first_name = $request->first_name ;
        $model->last_name = $request->last_name ;
        $model->middle_name = $request->middle_name ;
        $model->name_at_school = $request->name_at_school ;
        $model->vns =  $request->vns ;
        $model->birthday =  $request->birthday;
        $model->gender =  $request->gender ;
        $model->student_type =  $request->student_type ;
        $model->sickness =  $request->sickness ;
        $model->medicare_no =  $request->medicare_no ;
        $model->home_address =  $request->home_address ;
        $model->home_phone =  $request->home_phone ;
        $model->phone =  $request->phone ;
        $model->school_name =  $request->school_name ;
        $model->school_address =  $request->school_address ;
        $model->campus =  $request->campus ;
        $model->year_level_in_day_school =  $request->year_level_in_day_school ;
        $model->is_over_seas_student =  $request->is_over_seas_student ;
        $model->is_temporary_visa =  $request->is_temporary_visa ;
        $model->is_vsl =  $request->is_vsl ;
        $model->address_vsl =  $request->address_vsl ;
        $model->languages_vsl =  $request->languages_vsl ;
        $model->branch =  $request->branch ;
        $model->mom_name =  $request->mom_name ;
        $model->dad_name =  $request->dad_name ;
        $model->mom_phone =  $request->mom_phone ;
        $model->dad_phone =  $request->dad_phone ;
        $model->dad_email =  $request->dad_email ;
        $model->mom_email =  $request->mom_email ;
        $model->guardian_name =  $request->guardian_name;
        $model->relation =  $request->relation ;
        $model->guardian_phone =  $request->guardian_phone ;
        $model->date =  $request->date ;
        $model->invoice_no = $request->invoice_no;
        $model->grade_id =  $request->grade_id;
        if ($model->save()) {
            $id = $model->id;
            for($i = 1; $i <4 ; $i++) {
                $name = "full_name".$i;
                $grade = "grade_year".$i;
                if (!empty($request->$name)) {
                    $sibling = new Siblings();
                    $sibling->full_name = $request->$name;
                    $sibling->grade_year = $request->$grade;
                    $sibling->student_id = $id;
                    $sibling->save();
                }
            }

            return redirect("/students");
        }
    }
}
