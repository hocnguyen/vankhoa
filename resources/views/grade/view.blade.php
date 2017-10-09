<?php
use App\Grades;
?>
@extends('layouts.main')
@section('title','View Grade')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Chi tiết lớp - View Grade #{{ $model->id }}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <table class="table table-bordered">
                    <tr>
                        <td><label>#ID</label></td>
                        <td>{{ $model->id }}</td>
                    </tr>
                    <tr>
                        <td><label>Tên lớp (Name)</label></td>
                        <td>{{ $model->name }}</td>
                    </tr>
                    <tr>
                        <td><label>Năm học (School Year)</label></td>
                        <td>{{ $model->school_year }}</td>
                    </tr>
                    <tr>
                        <td><label>Số lượng học sinh (Number Student)</label></td>
                        <td>{{ $model->number_student }}</td>
                    </tr>
                    <tr>
                        <td><label>Chi nhánh (Branch)</label></td>
                        <td>{{ $model->branch }}</td>
                    </tr>
                    <tr>
                        <td><label>Trạn thái</label></td>
                        <td>
                            @if($model->status == Grades::STATUS_ACTIVE)
                                Hoạt động
                            @elseif($model->status == Grades::STATUS_INACTIVE)
                                Không hoạt động
                            @else
                                Đã xoá
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection