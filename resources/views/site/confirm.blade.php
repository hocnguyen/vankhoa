<?php
use App\Grades;
?>
@extends('layouts.main')
@section('title','Confirm End Of Year')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Confirm End Of Year</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="row">
                                    {{ Form::open(array('url' => '/endOfYear' , 'method' => 'post', 'id' => 'vankhoa_list'))}}

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <?php echo Form::label('password', 'Xác Nhận Mật Khẩu'); ?>
                                            <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'Vui lòng xác nhận mật khẩu']); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div style="text-align: center">
                                            <?php echo Form::button("End Of Year", ['type' => 'submit', 'class' => 'btn btn-success']); ?>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection