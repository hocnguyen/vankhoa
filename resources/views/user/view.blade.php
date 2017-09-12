<?php
use App\User;
?>
@extends('layouts.main')
@section('title','View User')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    View User #{{ $model->id }}
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
                        <td><label>User Name</label></td>
                        <td>{{ $model->username }}</td>
                    </tr>
                    <tr>
                        <td><label>Email</label></td>
                        <td>{{ $model->email }}</td>
                    </tr>
                    <tr>
                        <td><label>Firstname</label></td>
                        <td>{{ $model->firstname }}</td>
                    </tr>
                    <tr>
                        <td><label>Lastname</label></td>
                        <td>{{ $model->lastname }}</td>
                    </tr>
                    <tr>
                        <td><label>Phone</label></td>
                        <td>{{ $model->phone }}</td>
                    </tr>
                    <tr>
                        <td><label>Lastname</label></td>
                        <td>{{ $model->branch }}</td>
                    </tr>
                    <tr>
                        <td><label>Create At</label></td>
                        <td>{{ $model->created_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection