<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Danh sách người dùng - List User Page')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách người dùng - List Users</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Tên người dùng</th>
                                        <th>Tên đầy đủ </th>
                                        <th>Số địện thoại</th>
                                        <th>Chi nhánh</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($users as $value){ ?>
                                    <tr>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->username }}</td>
                                        <td>{{ $value->firstname . ' ' . $value->lastname }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->branch }}</td>
                                        <th>
                                            <a title="Detail" href="{{ url('/user/view/' . $value->id) }}"><i class="fa fa-eye"></i></a>
                                            <a title="Delete User"href="{{ url('/user/delete/' . $value->id) }}"><i class="fa fa-trash-o"></i></a>
                                            <a title="Update user" href="{{ url('/user/update/' . $value->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                            <a title="Change Password" href="{{ url('/user/changepass/' . $value->id) }}"><i class="fa fa-lock"></i></a>
                                            @if(Auth::User()->role == User::ROLE_ADMIN)
                                            <a title="Change Pass Pharse" href="{{ url('/user/changepasspharse/' . $value->id) }}"><i class="fa fa-unlock-alt "></i></a>
                                            @endif
                                        </th>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                {{ $users->render() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection