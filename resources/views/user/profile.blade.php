<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Profile Page')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Profile - Update user
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-right">
                        <a href="{{ url('/changemypassword') }}" class="btn btn-primary"> Đổi mật khẩu</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{ Form::open(array('url' => ('/profile') , 'method' => 'post', 'onsubmit' => 'return confirm("Bạn có chắc chắn thực hiện hành động này ?")')) }}
            {{ csrf_field() }}
            <div class="col-lg-6">
                <div class="form-group">
                    <?php echo Form::label('username', 'Tên người dùng (User Name)'); ?>
                    <?php echo Form::text('username', $model->username  , ['class' => 'form-control', 'placeholder' => 'Tên người dùng']); ?>
                    @if ($errors->has('username'))
                        <div class="invalid error_msg">{{ $errors->first('username') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('firstname', 'Họ (First Name)'); ?>
                    <?php echo Form::text('firstname', $model->firstname, ['class' => 'form-control', 'placeholder' => 'Họ']); ?>
                    @if ($errors->has('firstname'))
                        <div class="invalid error_msg">{{ $errors->first('firstname') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('lastname', 'Tên (Last Name)'); ?>
                    <?php echo Form::text('lastname', $model->lastname, ['class' => 'form-control', 'placeholder' => 'Tên']); ?>
                    @if ($errors->has('lastname'))
                        <div class="invalid error_msg">{{ $errors->first('lastname') }}</div>
                    @endif
                </div>

            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <?php echo Form::label('phone', 'Số điện thoại (Phone)'); ?>
                    <?php echo Form::text('phone', $model->phone, ['class' => 'form-control', 'placeholder' => 'Số điện thoại']); ?>
                    @if ($errors->has('phone'))
                        <div class="invalid error_msg">{{ $errors->first('phone') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('email', 'Email'); ?>
                    <?php echo Form::text('email', $model->email, ['class' => 'form-control', 'placeholder' => 'Email']); ?>
                    @if ($errors->has('email'))
                        <div class="invalid error_msg">{{ $errors->first('email') }}</div>
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