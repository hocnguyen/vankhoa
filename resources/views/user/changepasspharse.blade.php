<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Change Password Pharse User')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Change pass pharse user {{ $model->firstname }} {{ $model->lastname }}
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
            {{ Form::open(array('url' => '/user/changepasspharse/' .$model->id , 'method' => 'post')) }}
            {{ csrf_field() }}
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <?php echo Form::label('current_passwordpharse', 'Old Password Pharse'); ?>
                    <?php echo Form::password('current_passwordpharse', ['class' => 'form-control', 'placeholder' => 'Old Password Pharse']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('passwordpharse', 'New Password Pharse'); ?>
                    <?php echo Form::password('passwordpharse', ['class' => 'form-control', 'placeholder' => 'New Password Pharse']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('passwordpharse_confirmation', 'Confirm Password Pharse'); ?>
                    <?php echo Form::password('passwordpharse_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password Pharse']); ?>
                </div>

                <div style="text-align: center">
                    <?php echo Form::button('Change Password Pharse', ['type' => 'submit', 'class' => 'btn btn-success']); ?>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection