<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Chi tiết người dùng (View User)')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Chi tiết người dùng - Detail user
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <?php echo Form::label('name', 'ID'); ?>
                    <?php echo Form::text('name', \App\Http\Controllers\GradeController::generalID($model->id)  , ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('username', 'Tên người dùng (User Name)'); ?>
                    <?php echo Form::text('username', $model->username  , ['class' => 'form-control', 'readonly']); ?>
                </div>


                <div class="form-group">
                    <?php echo Form::label('email', 'Email'); ?>
                    <?php echo Form::text('email', $model->email, ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('firstname', 'Họ (First Name)'); ?>
                    <?php echo Form::text('firstname', $model->firstname, ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('lastname', 'Tên (Last Name)'); ?>
                    <?php echo Form::text('lastname', $model->lastname, ['class' => 'form-control', 'readonly']); ?>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <?php echo Form::label('passwordpharse', 'Password Pharse'); ?>
                    <?php echo Form::text('passwordpharse', $model->passwordpharse, ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('phone', 'Số điện thoại (Phone)'); ?>
                    <?php echo Form::text('phone', $model->phone, ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('branch', 'Chi nhánh (Branch)'); ?>
                    <?php echo Form::text('branch', $model->branch, ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('role', 'Quyền hạn (Role)'); ?>
                    <?php
                        $role = [ User::ROLE_ADMIN => 'Admin', User::ROLE_NORMAL => 'Normal'];
                    echo Form::text('role', $role[$model->role], ['class' => 'form-control', 'readonly']); ?>
                </div>

                <div class="form-group">
                    <?php echo Form::label('is_active', 'Trạng thái (Is Active)'); ?>
                    <?php
                    $arr = [User::STATUS_ACTIVE => 'Active', User::STATUS_INACTIVE => 'In Active'];
                    echo Form::text('is_active', $arr[$model->is_active], ['class' => 'form-control', 'readonly']); ?>
                </div>
            </div>
        </div>
    </div>

@endsection