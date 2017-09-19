<?php

namespace App\Http\Controllers;

use App\Attendances;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function attendance(Request $request, $time){
        if ($request->isMethod('post')) {
            $is_present = $request->request->get('is_present');
            $student_id = $request->request->get('student_id');
            $grade_id = $request->request->get('grade_id');
            $check = Attendances::where('grade_id', $grade_id)->where('student_id', $student_id)->where('time', $time)->first();
            if($check) {
                Attendances::where('id', $check->id)->update(['is_present' => $is_present]);
                return json_encode(array('success' => 1, 'message' => 'Attendances successfully!'));
            }else{
                $model = new Attendances();
                $model->grade_id = $grade_id;
                $model->student_id = $student_id;
                $model->is_present = $is_present;
                $model->time = $time;
                if ($model->save()) {
                    return json_encode(array('success' => 1, 'message' => 'Attendances successfully!'));
                } else {
                    return json_encode(array('success' => 0, 'message' => 'Attendances not successfully!'));
                }
            }

        }else{
            return json_encode(array('success' => 0, 'message' => 'Check Again!'));
        }
    }
}
