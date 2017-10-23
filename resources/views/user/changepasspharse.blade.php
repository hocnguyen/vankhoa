<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Đổi mật khẩu pharse (Change Password Pharse User)')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Đổi mật khẩu pharse - Change pass pharse
                </h1>
            </div>
        </div>
        <div class="row">
            {{ Form::open(array('url' => '/user/changepasspharse/' .$model->id , 'method' => 'post', 'onsubmit' => 'return confirm("Bạn có chắc chắn thực hiện hành động này ?")')) }}
            {{ csrf_field() }}
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    @if ($errors->has('errorchangepass'))
                        <div class="invalid error_msg">{{ $errors->first('errorchangepass') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <?php echo Form::label('current_passwordpharse', 'Mật khẩu pharse cũ (Old Password Pharse)'); ?>
                    <?php echo Form::password('current_passwordpharse', ['class' => 'form-control', 'placeholder' => 'Mật khẩu pharse cũ']); ?>
                    @if ($errors->has('current_passwordpharse'))
                        <div class="invalid error_msg">{{ $errors->first('current_passwordpharse') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('passwordpharse', 'Mật khẩu pharse mới'); ?>
                    <?php echo Form::password('passwordpharse', ['class' => 'form-control', 'placeholder' => 'Mật khẩu pharse mới']); ?>
                    @if ($errors->has('passwordpharse'))
                        <div class="invalid error_msg">{{ $errors->first('passwordpharse') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('passwordpharse_confirmation', 'Xác nhận mật khẩu pharse (Confirm Password Pharse)'); ?>
                    <?php echo Form::password('passwordpharse_confirmation', ['class' => 'form-control', 'placeholder' => 'Xác nhận mật khẩu pharse']); ?>
                    @if ($errors->has('passwordpharse_confirmation'))
                        <div class="invalid error_msg">{{ $errors->first('passwordpharse_confirmation') }}</div>
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