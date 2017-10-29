@extends('layouts.main')
@section('title','Điểm danh - Student attendances')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Điểm danh - Student attendances</h1>
            </div>
        </div>
        <div class="row">
            {{ Form::open(array('url' => '/attendance' , 'method' => 'get','id' => 'attendance'))}}
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group">
                    <label>Lớp - Class</label>
                    <select name="grade" id="grade" class="form-control">
                        <?php foreach($grades as $value){
                            if ($value->branch == \App\User::ST_ALBANS) {
                                $branch = \App\User::$branchs[1];
                            } else {
                                $branch = \App\User::$branchs[2];
                            }
                           echo  '<option value="'.$value->id.'">'.$value->name.' - ('.$branch.') </option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ngày - Day</label>
                    <input class="form-control" name="time" id="time">
                </div>
            </div>
            <div class="col-lg-12">
                <div style="text-align: center">
                    <label class="error_msg"></label> <br/>
                    <button type="button" class="btn btn-success attendant"> Điểm danh</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#time').datetimepicker({
                format: 'YYYY-MM-DD',
                ignoreReadonly: true
            });
            $(".attendant").click(function () {
                var time = $("#time").val();
                var grade = $("#grade").find(":selected").text();
                if (grade == "" || typeof grade == undefined || time == "" || typeof time == undefined) {
                    $(".error_msg").html("Vui lòng điền đầy đủ thông tin");
                } else {
                    $("#attendance").submit();
                }
            });
        })
    </script>
@endsection