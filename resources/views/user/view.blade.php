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
            <div class="col-lg-6 col-lg-offset-3">
                <table class="table table-bordered">
                    <tr>
                        <td><label>Tên người dùng (User Name)</label></td>
                        <td>{{ $model->username }}</td>
                    </tr>
                    <tr>
                        <td><label>Email</label></td>
                        <td>{{ $model->email }}</td>
                    </tr>
                    <tr>
                        <td><label>Họ (Firstname)</label></td>
                        <td>{{ $model->firstname }}</td>
                    </tr>
                    <tr>
                        <td><label>Tên (Lastname)</label></td>
                        <td>{{ $model->lastname }}</td>
                    </tr>
                    <tr>
                        <td><label>Điện thoại (Phone)</label></td>
                        <td>{{ $model->phone }}</td>
                    </tr>
                    <tr>
                        <td><label>Chi nhánh (Branch)</label></td>
                        <td>{{ $model->branch }}</td>
                    </tr>
                    <tr>
                        <td><label>Trạng thái (Is Active)</label></td>
                        <td>
                            <?php if ($model->is_active == User::STATUS_ACTIVE) {
                                echo "Active";
                            } else {
                                echo "Inactive";
                            } ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection