<?php
use App\Attendances;
?>
@extends('layouts.main')
@section('title','Student attendances')
@section('content')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Student attendances</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <input type="hidden" value="{{ $grade }}" id="grade_id">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Full Name</th>
                                        <th>Middle Name</th>
                                        <th>Phone</th>
                                        <th>Branch</th>
                                        <th>Attendances</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $time = date('Y-m-d 00:00:00');
                                    foreach ($students as $student){
                                    $check = Attendances::where('grade_id', $grade)->where('student_id', $student->id)->where('time', $time)->first();
                                    $class = '';
                                    if($check){
                                        if($check->is_present == Attendances::STATUS_NO_HAVING){
                                            $class = 'no-having';
                                        }elseif($check->is_present == Attendances::STATUS_HAVING){
                                            $class = 'having';
                                        }else{
                                            $class = 'empty';
                                        }
                                    }
                                    ?>
                                    <tr class="student-{{ $student->id }} {{ $class }}" data-id="{{ $student->id }}">
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->first_name }}</td>
                                        <td>{{ $student->last_name }}</td>
                                        <td>{{ $student->middle_name }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->branch }}</td>
                                        <td>
                                            <?php
                                            $arr_status = array( Attendances::STATUS_EMPTY => 'Empty', Attendances::STATUS_HAVING => 'Having', Attendances::STATUS_NO_HAVING => 'No having');
                                            foreach($arr_status as $key=>$value){ ?>
                                                <label style="font-weight: normal"><input name="{{ $student->id }}_attendances" {{ ($check && $check->is_present == $key)?'checked="checked"':'' }} type="radio" value="{{ $key }}" style="margin: 0px 10px 0px 10px">{{ $value }}</label>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('tr input').click(function () {
                var is_present = $(this).val();
                var student_id = $(this).closest('tr').data('id');
                var grade_id = $('#grade_id').val();
                var CSRF_TOKEN = $('input[name=_token]').val();
                var object = $(this);

                $.post('{{ url('/attendance/' . $time)  }}', {is_present: is_present, student_id: student_id, grade_id: grade_id, _token: CSRF_TOKEN}, function (response) {
                    var response = JSON.parse(response);
                    if(response.success == 1){
                        if(object.val() == '<?php echo Attendances::STATUS_NO_HAVING ?>'){
                            object.closest('tr').removeClass('having');
                            object.closest('tr').removeClass('empty');
                            object.closest('tr').addClass('no-having');
                        }else if(object.val() == '<?php echo Attendances::STATUS_HAVING ?>'){
                            object.closest('tr').removeClass('no-having');
                            object.closest('tr').removeClass('empty');
                            object.closest('tr').addClass('having');
                        }else{
                            object.closest('tr').removeClass('no-having');
                            object.closest('tr').removeClass('having');
                            object.closest('tr').addClass('empty');
                        }
                        alertify.success(response.message);
                    }else{
                        alertify.error(response.message);
                    }
                })

            })
        })
    </script>
@endsection