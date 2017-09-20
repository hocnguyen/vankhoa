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
                    View Grade #{{ $model->id }}
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
                        <td><label>Name</label></td>
                        <td>{{ $model->name }}</td>
                    </tr>
                    <tr>
                        <td><label>School Year</label></td>
                        <td>{{ $model->school_year }}</td>
                    </tr>
                    <tr>
                        <td><label>Number Student</label></td>
                        <td>{{ $model->number_student }}</td>
                    </tr>
                    <tr>
                        <td><label>Branch</label></td>
                        <td>{{ $model->branch }}</td>
                    </tr>
                    <tr>
                        <td><label>Branch</label></td>
                        <td>
                            @if($model->status == Grades::STATUS_ACTIVE)
                                Active
                            @elseif($model->status == Grades::STATUS_INACTIVE)
                                In Active
                            @else
                                Deleted
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection