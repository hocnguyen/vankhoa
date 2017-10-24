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
        //$grades = Grades::where('id', '>', 0)->orderBy('id', 'DESC')->paginate(10);

        $grades = DB::table('grades')
            ->join('users', 'users.id', '=', 'grades.user_id')
            ->select('grades.*', 'users.firstname', 'users.lastname', 'users.username')
            ->where("grades.id",">",0)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('grade.index', ['grades' => $grades]);
    }

    public function getCreate(){
        $model = new Grades();
        $teachers = DB::table('users')
            ->select('users.id', 'users.firstname', 'users.lastname', 'users.username')
            ->where("is_active",Grades::STATUS_ACTIVE)
            ->where("role",User::ROLE_TEACHER)
            ->where("branch",User::ST_ALBANS)
            ->get();
        $teacher = [];
        foreach ($teachers as $item) {
            $teacher[$item->id] = $item->firstname." ".$item->lastname. " ( ".$item->username." )";
        }
        return view('grade.form', ['model' => $model, 'teachers' => $teacher]);
    }

    public function postCreate(Request $request){
        $model = new Grades();

        $this->validate($request, $model->rules);

        $model->name = $request->name;
        $model->school_year = $request->school_year;
        $model->number_student = $request->number_student;
        $model->branch = $request->branch;
        $model->status = $request->status;
        $model->user_id = $request->user_id;
        if ($model->save()) {
            return redirect("/grades");
        }
    }

    public function getUpdate($id){
        $model = Grades::find($id);
        $teachers = DB::table('users')
            ->select('users.id', 'users.firstname', 'users.lastname', 'users.username')
            ->where("is_active",Grades::STATUS_ACTIVE)
            ->where("role",User::ROLE_TEACHER)
            ->where("branch",User::ST_ALBANS)
            ->get();
        $teacher = [];
        foreach ($teachers as $item) {
            $teacher[$item->id] = $item->firstname." ".$item->lastname. " ( ".$item->username." )";
        }
        return view('grade.form', ['model' => $model, 'teachers' => $teacher]);
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
