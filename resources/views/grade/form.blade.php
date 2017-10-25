<?php
use App\Grades;
use App\User;
?>
@extends('layouts.main')
@section('title','Tạo mới lớp - Create Grade')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    @if($model->exists)
                        Chỉnh sửa lớp - Update Grade
                    @else
                        Tạo mới lớp - Create Grade
                    @endif
                </h1>
            </div>
        </div>
        <div class="row">
            {{ Form::open(array('url' => ($model->exists?'/grade/update/' .$model->id:'/grade/create') , 'method' => 'post', 'onsubmit' => 'return confirm("Bạn có chắc chắn thực hiện hành động này ?")')) }}
            {{ csrf_field() }}
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <?php echo Form::label('name', 'Tên lớp (Name)'); ?>
                    <?php echo Form::text('name', $model->name  , ['class' => 'form-control', 'placeholder' => 'Tên lớp']); ?>
                    @if ($errors->has('name'))
                        <div class="invalid error_msg">{{ $errors->first('name') }}</div>
                    @endif
                </div>


                <div class="form-group">
                    <?php echo Form::label('school_year', 'Năm học (School Year)'); ?>
                    <?php echo Form::text('school_year', $model->school_year, ['class' => 'form-control', 'placeholder' => 'Năm học']); ?>
                    @if ($errors->has('school_year'))
                        <div class="invalid error_msg">{{ $errors->first('school_year') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('number_student', 'Số lượng học sinh (Number Student)'); ?>
                    <?php echo Form::text('number_student', $model->number_student, ['class' => 'form-control', 'placeholder' => 'Số lượng học sinh']); ?>
                    @if ($errors->has('number_student'))
                        <div class="invalid error_msg">{{ $errors->first('number_student') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('branch', 'Chi nhánh (Branch)'); ?>
                    <?php echo Form::select('branch', User::$branchs, $model->branch, ['class' => 'form-control select_branch']); ?>
                    @if ($errors->has('branch'))
                        <div class="invalid error_msg">{{ $errors->first('branch') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('user_id', 'Giáo viên phụ trách (Teacher)'); ?>
                    <?php echo Form::select('user_id', $teachers, $model->user_id, ['class' => 'form-control teacher_list', 'placeholder' => 'Chọn Giáo Viên']); ?>
                    @if ($errors->has('user_id'))
                        <div class="invalid error_msg">{{ $errors->first('user_id') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('status', 'Trạng thái (Status)'); ?>
                    <?php echo Form::select('status', [ Grades::STATUS_INACTIVE => 'Không hoạt động', Grades::STATUS_ACTIVE => 'Hoạt động', Grades::STATUS_DELETED => 'Đã xoá'], $model->status, ['class' => 'form-control', 'placeholder' => 'Chọn một']); ?>
                    @if ($errors->has('status'))
                        <div class="invalid error_msg">{{ $errors->first('status') }}</div>
                    @endif
                </div>

            </div>
            <div class="col-lg-12">
                <div style="text-align: center">
                    <?php echo Form::button( ($model->exists?'Chỉnh sửa':'Tạo mới') , ['type' => 'submit', 'class' => 'btn btn-success']); ?>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection