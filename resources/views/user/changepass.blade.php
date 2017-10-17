<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Đổi mật khẩu - Change Password User')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Đổi mật khẩu - Change password
                </h1>
            </div>
        </div>
        <div class="row">
            {{ Form::open(array('url' => '/user/changepass/' .$model->id , 'method' => 'post', 'onsubmit' => 'return confirm("Bạn có chắc chắn thực hiện hành động này ?")')) }}
            {{ csrf_field() }}
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <?php echo Form::label('current_password', 'Mật khẩu cũ (Old Password)'); ?>
                    <?php echo Form::password('current_password', ['class' => 'form-control', 'placeholder' => 'Mật khẩu cũ']); ?>
                    @if ($errors->has('current_password'))
                        <div class="invalid error_msg">{{ $errors->first('current_password') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('password', 'Mật khẩu mới (New Password)'); ?>
                    <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mật khẩu mới']); ?>
                    @if ($errors->has('password'))
                        <div class="invalid error_msg">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('password_confirmation', 'Xác nhận mật khẩu (Confirm Password)'); ?>
                    <?php echo Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Xác nhận mật khẩu']); ?>
                    @if ($errors->has('password_confirmation'))
                        <div class="invalid error_msg">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>

                <div style="text-align: center">
                    <?php echo Form::button('Đổi mật khẩu', ['type' => 'submit', 'class' => 'btn btn-success']); ?>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection