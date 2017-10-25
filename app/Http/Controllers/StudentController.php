<?php

namespace App\Http\Controllers;

use App\Grades;
use App\Invoices;
use App\Siblings;
use App\Students;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function formList(){
        if (session()->get('role') == User::ROLE_ADMIN) {
            $grades = DB::table('grades')
                ->where('school_year', $this->getYear())
                ->where('status', Grades::STATUS_ACTIVE)
                ->where('branch', User::ST_ALBANS)
                ->get();
        } else {
            $grades = DB::table('grades')
                ->where('user_id', Auth::User()->id)
                ->where('school_year', $this->getYear())
                ->where('status', Grades::STATUS_ACTIVE)
                ->where('branch', User::ST_ALBANS)
                ->get();
        }

        return view("student.form_list", ['grades' => $grades]);
    }
    public  function index(){
        if(isset($_GET['grade']) && trim($_GET['grade']) != '' && isset($_GET['branch']) && trim($_GET['branch']) != '') {
            $grade = trim($_GET['grade']);
            $branch = trim($_GET['branch']);
            $student = DB::table('students')
                ->join('grades', 'students.grade_id', '=', 'grades.id')
                ->select('students.*', 'grades.name')
                ->where("is_deleted", 0)->where('grades.id', $grade)->where('students.branch', $branch)
                ->paginate(10);
            return view("student.index", ["data" => $student, "grade" => $grade, "branch" => $branch]);
        }else{
            return redirect("/error");
        }
    }

    public function attendances(){
        if (session()->get('role') == User::ROLE_ADMIN) {
            $grades = DB::table('grades')
                ->where('school_year', $this->getYear())
                ->where('status', Grades::STATUS_ACTIVE)
                ->get();
        } else {
            $grades = DB::table('grades')
                ->where('user_id', Auth::User()->id)
                ->where('school_year', $this->getYear())
                ->where('status', Grades::STATUS_ACTIVE)
                ->get();
        }
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

    public function enrolment(Request $request){
        $model = new Students();
        $sibling = new Siblings();
        $grade = DB::table('grades')->where('id',$request->get('grade'))->where("status",1)->get();
        $branch = $request->get("branch");
        $invoice = new Invoices();
        return view('student.form', ['model' => $model,'grade'=>$grade,"sibling" =>$sibling, "branch" => $branch, 'invoice' => $invoice]);
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

            for($i = 1; $i < 5 ; $i++) {
                $invoice_no = "invoice_no" . $i;
                $expired_date = "expired_date" . $i;
                if (!empty($request->$invoice_no)) {
                    $invoices = new Invoices();
                    $invoices->invoice_no = $request->$invoice_no;
                    $invoices->expired_date = $request->$expired_date;
                    $invoices->student_id = $id;
                    $invoices->term = $i;
                    $invoices->save();
                }
            }

            return redirect("/students");
        }
    }

    public function getUpdate($id){
        $model = Students::find($id);
        $current_year = date("Y");
        $sibling =  Siblings::whereRaw('student_id = '.$id)->get();
        $grade = Grades::whereRaw('school_year = '.$current_year." and status = 1")->get();
        $invoice = Invoices::whereRaw('student_id = '.$id)->get();
        return view('student.form', ['model' => $model,'grade'=>$grade,"sibling" =>$sibling, 'invoice' => $invoice]);
    }

    public function postUpdate(Request $request, $id){
        $model = Students::find($id);
        $rule = $model->rules;
        $this->validate($request, $rule);

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
        if ($model->update()) {
            $collection = Siblings::where('student_id', $id)->get(['id']);
            Siblings::destroy($collection->toArray());
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

            $invoices = Invoices::where('student_id', $id)->get(['id']);
            Invoices::destroy($invoices->toArray());
            for($i = 1; $i < 5 ; $i++) {
                $invoice_no = "invoice_no" . $i;
                $expired_date = "expired_date" . $i;
                if (!empty($request->$invoice_no)) {
                    $invoices = new Invoices();
                    $invoices->invoice_no = $request->$invoice_no;
                    $invoices->expired_date = $request->$expired_date;
                    $invoices->student_id = $id;
                    $invoices->save();
                }
            }
            return redirect("/student/view/".$id);
        }
    }

    public function view($id){
        $sibling =  Siblings::whereRaw('student_id = '.$id)->get();
        $model = DB::table('students')
            ->join('grades', 'students.grade_id', '=', 'grades.id')
            ->select('students.*', 'grades.name')
            ->where('students.id',$id)
            ->get();
        return view('student.view', ['model' => $model[0],"sibling" =>$sibling]);
    }

    public function delete($id){
        $student = Students::find($id);
        $student->is_deleted = 1;
        if ($student->update()) {
            return redirect("/students");
        }
    }

    public function outStanding(){
        $year =  $this->getYear();
        $model = DB::table('students')
            ->join('grades', 'students.grade_id', '=', 'grades.id')
            ->select('students.*', 'grades.name')
            ->where([
                ['students.invoice_no', '=', ""],
                ['grades.school_year', '=', $year],
            ])
            ->get();
        return view('student.outStanding', ['data' => $model,]);
    }

    public function getClassOfBranch($id){
        if (session()->get('role') == User::ROLE_ADMIN) {
            $grades = DB::table('grades')
                ->where("school_year",$this->getYear())
                ->where("branch",$id)
                ->get();
        } else {
            $grades = DB::table('grades')
                ->where("school_year",$this->getYear())
                ->where("branch",$id)
                ->where('user_id', Auth::User()->id)
                ->get();
        }
        return view('student.grades', ['data' => $grades,]);
    }  
    
    
}
