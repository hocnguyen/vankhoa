<?php

namespace App\Http\Controllers;

use App\Grades;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class GradeController extends Controller
{
    public function index(){
        $grades = DB::table('grades')
            ->join('users', 'users.id', '=', 'grades.user_id')
            ->select('grades.*', 'users.firstname', 'users.lastname', 'users.username')
            ->where("grades.id",">",0)
            ->where("grades.branch","=",1)
            ->where("grades.school_year","=",$this->getYear())
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return view('grade.index', ['grades' => $grades]);
    }

    public function ajaxIndex($branch){
        $grades = DB::table('grades')
            ->join('users', 'users.id', '=', 'grades.user_id')
            ->select('grades.*', 'users.firstname', 'users.lastname', 'users.username')
            ->where("grades.id",">",0)
            ->where("grades.branch","=",$branch)
            ->where("grades.school_year","=",$this->getYear())
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return view('grade.indexAjax', ['grades' => $grades]);
    }

    public function getCreate(){
        $model = new Grades();
        $teachers = DB::table('users')
            ->select('users.id', 'users.firstname', 'users.lastname', 'users.username')
            ->where("is_active",Grades::STATUS_ACTIVE)
            ->where("role",User::ROLE_TEACHER)
            ->get();
        $teacher = [];
        foreach ($teachers as $item) {
            $teacher[$item->id] = $item->firstname." ".$item->lastname. " ( ".$item->username." )";
        }
        $years = DB::table('years')->orderBy("id", "DESC")->get();
        $old_grade = "";
        if (count($years) > 0 && ($this->getYear()> $years[0]->year)) {
            $old_grade = DB::table('grades')
                ->where("grades.school_year","=",$years[0]->year)
                ->get();
        }
        return view('grade.form', ['model' => $model, 'teachers' => $teacher, "old_grade" => $old_grade]);
    }

    public function postCreate(Request $request){
        $model = new Grades();
        $model->name = $request->name;
        $model->school_year = $request->school_year;
        $model->number_student = $request->number_student;
        $model->branch = $request->branch;
        $model->status = $request->status;
        $model->user_id = $request->user_id;
        if ($model->save()) {
            if (isset($request->old_grade)) {
                $sql = "UPDATE `students` SET `grade_id`='".$model->id."' WHERE `grade_id`='".$request->old_grade."'";
                DB::statement($sql);
            }
            return redirect("/grades");
        }
    }

    public function getUpdate($id){
        $model = Grades::find($id);
        $teachers = DB::table('users')
            ->select('users.id', 'users.firstname', 'users.lastname', 'users.username')
            ->where("is_active",Grades::STATUS_ACTIVE)
            ->where("role",User::ROLE_TEACHER)
            ->get();
        $teacher = [];
        foreach ($teachers as $item) {
            $teacher[$item->id] = $item->firstname." ".$item->lastname. " ( ".$item->username." )";
        }
        $years = DB::table('years')->orderBy("id", "DESC")->get();
        $old_grade = "";
        if (count($years) > 0 && ($this->getYear()> $years[0]->year)) {
            $old_grade = DB::table('grades')->where("grades.school_year","=",$years[0]->year)->get();
        }
        return view('grade.form', ['model' => $model, 'teachers' => $teacher, "old_grade" => $old_grade]);
    }

    public function postUpdate(Request $request, $id){
        $model = Grades::find($id);
        $this->validate($request, $model->rules);

        $model->name = $request->name;
        $model->school_year = $request->school_year;
        $model->number_student = $request->number_student;
        $model->branch = $request->branch;
        $model->status = $request->status;
        $model->user_id = $request->user_id;
        if ($model->update()) {
            if (isset($request->old_grade)) {
                $sql = "UPDATE `students` SET `grade_id`='".$id."' WHERE `grade_id`='".$request->old_grade."'";
                DB::statement($sql);
            }
            return redirect("/grades");
        }
    }

    public function view($id){
        $model = DB::table('grades')
            ->join('users', 'users.id', '=', 'grades.user_id')
            ->select('grades.*', 'users.firstname', 'users.lastname', 'users.username')
            ->where("grades.id",$id)
            ->get();
        return view('grade.view', ['model' => $model[0]]);
    }

    public function delete($id){
        $model = Grades::find($id);
        if($model->attendances){
            foreach ($model->attendances as $value){
                if($value)
                    $value->delete();
            }
        }
        if($model->students){
            foreach ($model->students as $value){
                if($value)
                    $value->delete();
            }
        }

        Grades::where('id', $id)->delete();
        return redirect("/grades");
    }

}
