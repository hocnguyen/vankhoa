<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Chọn lớp và chi nhánh')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chọn lớp và chi nhánh</h1>
            </div>
        </div>
        <div class="row">
            {{ Form::open(array('url' => '/students' , 'method' => 'get'))}}
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group">
                    <label>Lớp - Class</label>
                    <select name="grade" class="form-control">
                        <?php foreach($grades as $value){
                           echo  '<option value="'.$value->id.'">'.$value->name.'</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Chi nhánh - Branch</label>
                    <select name="branch" class="form-control">
                        <?php
                        foreach(User::$branchs as $key => $value){
                            echo  '<option value="'.$key.'">'.$value.'</option>';
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div style="text-align: center">
                    <button type="submit" class="btn btn-success"> Điểm danh</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection