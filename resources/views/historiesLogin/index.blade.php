@extends('layouts.main')
@section('title','Histories Login Page')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Histories Login</h1>
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
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Full Name</th>
                                    <th>Time Login</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($histories as $value){ ?>
                                    <tr>
                                        <td>{{ $value->id }}</td>
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