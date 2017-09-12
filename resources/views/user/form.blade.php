<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Create User')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    @if($model->exists)
                        Update User #{{ $model->id }}
                    @else
                        Create User
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
            {{ Form::open(array('url' => ($model->exists?'/user/update/' .$model->id:'/user/create') , 'method' => 'post')) }}
            {{ csrf_field() }}
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo Form::label('username', 'User Name'); ?>
                        <?php echo Form::text('username', $model->username  , ['class' => 'form-control', 'placeholder' => 'User Name']); ?>
                    </div>


                    <div class="form-group">
                        <?php echo Form::label('email', 'Email'); ?>
                        <?php echo Form::text('email', $model->email, ['class' => 'form-control', 'placeholder' => 'Email']); ?>
                    </div>

                    @if(!$model->exists)
                    <div class="form-group">
                        <?php echo Form::label('password', 'Password'); ?>
                        <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']); ?>
                    </div>
                    @endif

                    <div class="form-group">
                        <?php echo Form::label('firstname', 'First Name'); ?>
                        <?php echo Form::text('firstname', $model->firstname, ['class' => 'form-control', 'placeholder' => 'First Name']); ?>
                    </div>

                    <div class="form-group">
                        <?php echo Form::label('lastname', 'Last Name'); ?>
                        <?php echo Form::text('lastname', $model->lastname, ['class' => 'form-control', 'placeholder' => 'Last Name']); ?>
                    </div>

                </div>

                <div class="col-lg-6">
                    @if(!$model->exists)
                    <div class="form-group">
                        <?php echo Form::label('passwordpharse', 'Password Pharse'); ?>
                        <?php echo Form::password('passwordpharse', ['class' => 'form-control', 'placeholder' => 'Password Pharse']); ?>
                    </div>
                    @endif

                    <div class="form-group">
                        <?php echo Form::label('phone', 'Phone'); ?>
                        <?php echo Form::text('phone', $model->phone, ['class' => 'form-control', 'placeholder' => 'Phone']); ?>
                    </div>

                    <div class="form-group">
                        <?php echo Form::label('branch', 'Branch'); ?>
                        <?php echo Form::text('branch', $model->branch, ['class' => 'form-control', 'placeholder' => 'Branch']); ?>
                    </div>

                    <div class="form-group">
                        <?php echo Form::label('role', 'Role'); ?>
                        <?php echo Form::select('role', [ User::ROLE_ADMIN => 'Admin', User::ROLE_NORMAL => 'Normal'], $model->role, ['class' => 'form-control', 'placeholder' => 'Please select one']); ?>
                    </div>

                    <div class="form-group">
                        <?php echo Form::label('is_active', 'Is Active'); ?>
                        <?php echo Form::select('is_active', [User::STATUS_ACTIVE => 'Active', User::STATUS_INACTIVE => 'In Active'], $model->is_active, ['class' => 'form-control', 'placeholder' => 'Please select one']); ?>
                    </div>
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