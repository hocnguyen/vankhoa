<?php
use App\Grades;
use App\User;
?>
@extends('layouts.main')
@section('title','Danh sách lớp - List Grade Page')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách lớp - List Grades</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-right">
                                <label style="margin-top: 8px" class="col-md-2">Tìm kiếm branch</label>
                                <div class="col-md-4">
                                    <select class="form-control branchs">
                                        <option value="1"> St. Albans </option>
                                        <option value="2"> South Yarra </option>
                                    </select>
                                </div>
                                <a href="{{ url('/grade/create') }}" class="btn btn-primary"> Thêm Mới Lớp</a>
                            </div>
                            <div class="panel-body">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên lớp</th>
                                        <th>Năm học</th>
                                        <th>Số lượng</th>
                                        <th>Giáo Viên</th>
                                        <th>Chi nhánh</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="content">
                                    <?php foreach ($grades as $value){ ?>
                                    <tr>
                                        <td>{{ \App\Http\Controllers\GradeController::generalID($value->id) }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->school_year }}</td>
                                        <td>{{ $value->number_student }}</td>
                                        <td>{{ $value->firstname." ".$value->lastname." ( ". $value->username ." ) " }}</td>
                                        <td>{{ User::$branchs[$value->branch] }}</td>
                                        <td>
                                            @if($value->status == Grades::STATUS_ACTIVE)
                                                Active
                                            @elseif($value->status == Grades::STATUS_INACTIVE)
                                                InActive
                                            @else
                                                Deleted
                                            @endif
                                        </td>
                                        <th>
                                            <a title="View" href="{{ url('/grade/view/' . $value->id) }}"><i class="fa fa-eye"></i></a>
                                            <a title="Delete" class="action-delete" href="{{ url('/grade/delete/' . $value->id) }}"><i class="fa fa-trash-o"></i></a>
                                            <a title="Update" href="{{ url('/grade/update/' . $value->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                        </th>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                {{ $grades->render() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.action-delete', function () {
                if(confirm("Bạn có chắc chắn thực hiện hành động này ?")){
                    windown.href($(this).attr('href'));
                }
                return false;
            })
        })
    </script>
@endsection