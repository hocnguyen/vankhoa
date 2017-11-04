<?php
use App\Grades;
use App\User;
?>
@extends('layouts.main')
@section('title','View Grade')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Chi tiết lớp - Detail Grade {{ $model->name }}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <?php echo Form::label('name', 'ID'); ?>
                    <?php echo Form::text('name', \App\Http\Controllers\GradeController::generalID($model->id)  , ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('name', 'Tên lớp (Name)'); ?>
                    <?php echo Form::text('name', $model->name  , ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('school_year', 'Năm học (School Year)'); ?>
                    <?php echo Form::text('school_year', $model->school_year, ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('number_student', 'Số lượng học sinh (Number Student)'); ?>
                    <?php echo Form::text('number_student', $model->number_student, ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('branch', 'Chi nhánh (Branch)'); ?>
                    <?php echo Form::text('branch', User::$branchs[$model->branch], ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('user_id', 'Giáo viên phụ trách (Teacher)'); ?>
                    <?php echo Form::text('user_id', $model->firstname." ".$model->lastname." ( ".$model->username." ) ", ['class' => 'form-control',  'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('status', 'Trạng thái (Status)'); ?>
                    <?php
                    $arr = [ Grades::STATUS_INACTIVE => 'InActive', Grades::STATUS_ACTIVE => 'Active', Grades::STATUS_DELETED => 'Deleted'];
                    echo Form::text('status', $arr[$model->status], ['class' => 'form-control', 'readonly']); ?>
                </div>
            </div>
        </div>
    </div>

@endsection