<?php
use App\Grades;
?>
@extends('layouts.main')
@section('title','Create Grade')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    @if($model->exists)
                        Update Grade #{{ $model->id }}
                    @else
                        Create Grade
                    @endif
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $error }}
                    </div>
                @endforeach
            </div>
            {{ Form::open(array('url' => ($model->exists?'/grade/update/' .$model->id:'/grade/create') , 'method' => 'post')) }}
            {{ csrf_field() }}
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <?php echo Form::label('name', 'Name'); ?>
                    <?php echo Form::text('name', $model->name  , ['class' => 'form-control', 'placeholder' => 'Name']); ?>
                </div>


                <div class="form-group">
                    <?php echo Form::label('school_year', 'School Year'); ?>
                    <?php echo Form::text('school_year', $model->school_year, ['class' => 'form-control', 'placeholder' => 'School Year']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('number_student', 'Number Student'); ?>
                    <?php echo Form::text('number_student', $model->number_student, ['class' => 'form-control', 'placeholder' => 'Number Student']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('branch', 'Branch'); ?>
                    <?php echo Form::text('branch', $model->branch, ['class' => 'form-control', 'placeholder' => 'Branch']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('status', 'Status'); ?>
                    <?php echo Form::select('status', [ Grades::STATUS_INACTIVE => 'In Active', Grades::STATUS_ACTIVE => 'Active', Grades::STATUS_DELETED => 'Deleted'], $model->status, ['class' => 'form-control', 'placeholder' => 'Please select one']); ?>
                </div>
                <?php echo Form::hidden('user_id', Auth::User()->id); ?>

            </div>
            <div class="col-lg-12">
                <div style="text-align: center">
                    <?php echo Form::button( ($model->exists?'Update':'Create') , ['type' => 'submit', 'class' => 'btn btn-success']); ?>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection