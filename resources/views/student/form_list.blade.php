<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Chọn lớp và chi nhánh')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chọn lớp và chi nhánh</h1>
            </div>
        </div>
        <div class="row">
            {{ Form::open(array('url' => '/students' , 'method' => 'get', 'id' => 'student_list'))}}
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group">
                    <label>Chi nhánh - Branch</label>
                    <select name="branch" class="form-control branch_list" >
                        <?php
                        foreach(User::$branchs as $key => $value){
                            echo  '<option value="'.$key.'">'.$value.'</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Lớp - Class</label>
                    <select name="grade" class="form-control grade_list">
                        <?php foreach($grades as $value){
                            echo  '<option value="'.$value->id.'">'.$value->name.'</option>';
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div style="text-align: center">
                    <label class="error_msg"></label> <br/>
                    <button type="button" class="btn btn-success find_student"> Tìm Kiếm Học Sinh</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {

            $(".find_student").click(function () {
                var branch = $(".branch_list").find(":selected").text();
                var grade = $(".grade_list").find(":selected").text();
                if (grade == "" || typeof grade == undefined || branch == "" || typeof branch == undefined) {
                    $(".error_msg").html("Vui lòng điền đầy đủ thông tin");
                } else {
                    $("#student_list").submit();
                }
            });
        })
    </script>

@endsection