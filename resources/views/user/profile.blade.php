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
                    <?php echo Form::label('email', 'Email'); ?>
                    <?php echo Form::text('email', $model->email, ['class' => 'form-control', 'placeholder' => 'Email']); ?>
                    @if ($errors->has('email'))
                        <div class="invalid error_msg">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                @if(!$model->exists)
                    <div class="form-group">
                        <?php echo Form::label('password', 'Mật khẩu (Password)'); ?>
                        <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mật khẩu']); ?>
                        @if ($errors->has('password'))
                            <div class="invalid error_msg">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                @endif

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
                @if(!$model->exists)
                    <div class="form-group">
                        <?php echo Form::label('passwordpharse', 'Password Pharse'); ?>
                        <?php echo Form::password('passwordpharse', ['class' => 'form-control', 'placeholder' => 'Password Pharse']); ?>
                        @if ($errors->has('passwordpharse'))
                            <div class="invalid error_msg">{{ $errors->first('passwordpharse') }}</div>
                        @endif
                    </div>
                @endif

                <div class="form-group">
                    <?php echo Form::label('phone', 'Số điện thoại (Phone)'); ?>
                    <?php echo Form::text('phone', $model->phone, ['class' => 'form-control', 'placeholder' => 'Số điện thoại']); ?>
                    @if ($errors->has('phone'))
                        <div class="invalid error_msg">{{ $errors->first('phone') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('branch', 'Chi nhánh (Branch)'); ?>
                    <?php echo Form::select('branch', User::$branchs, $model->branch, ['class' => 'form-control']); ?>
                    @if ($errors->has('branch'))
                        <div class="invalid error_msg">{{ $errors->first('branch') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('role', 'Quyền hạn (Role)'); ?>
                    <?php echo Form::select('role', [ User::ROLE_ADMIN => 'Admin', User::ROLE_TEACHER => 'Teacher'], $model->role, ['class' => 'form-control', 'placeholder' => 'Chọn một']); ?>
                    @if ($errors->has('role'))
                        <div class="invalid error_msg">{{ $errors->first('role') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <?php echo Form::label('is_active', 'Trạng thái (Is Active)'); ?>
                    <?php echo Form::select('is_active', [User::STATUS_ACTIVE => 'Active', User::STATUS_INACTIVE => 'In Active'], $model->is_active, ['class' => 'form-control', 'placeholder' => 'Chọn một']); ?>
                    @if ($errors->has('is_active'))
                        <div class="invalid error_msg">{{ $errors->first('is_active') }}</div>
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