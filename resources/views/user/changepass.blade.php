<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Change Password User')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Change Password User #{{ $model->id }}
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
            {{ Form::open(array('url' => '/user/changepass/' .$model->id , 'method' => 'post')) }}
            {{ csrf_field() }}
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <?php echo Form::label('current_password', 'Old Password'); ?>
                    <?php echo Form::password('current_password', ['class' => 'form-control', 'placeholder' => 'Old Password']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('password', 'New Password'); ?>
                    <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'New Password']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('password_confirmation', 'Confirm Password'); ?>
                    <?php echo Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']); ?>
                </div>

                <div style="text-align: center">
                    <?php echo Form::button('Change Password', ['type' => 'submit', 'class' => 'btn btn-success']); ?>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection