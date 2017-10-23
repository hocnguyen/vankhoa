@extends('layouts.main')
@section('title','Lịch sửa login - Histories Login Page')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lịch sửa login - Histories Login</h1>
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
                                    <th>Tên người dùng</th>
                                    <th>Tên đầy đủ</th>
                                    <th>Thời gian</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($histories as $value){ ?>
                                    <tr>
                                        <td>{{ $value->user->username }}</td>
                                        <td>{{ $value->user->firstname . ' ' . $value->user->lastname }}</td>
                                        <td>{{ date('H:m:s d-m-Y', strtotime($value->time_login)) }}</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            {{ $histories->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection