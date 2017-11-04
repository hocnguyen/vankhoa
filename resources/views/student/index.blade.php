<?php
use App\Grades;
?>
@extends('layouts.main')
@section('title','Danh sách Học Sinh -  Students List Page')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách Học Sinh - Students List</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-right">
                                <a href="<?php echo  url('/student/enrolment').'?grade='.$grade.'&branch='.$branch ?>" class="btn btn-primary"> Thêm Mới Học Sinh</a>
                                <?php if (Auth::User()->role == \App\User::ROLE_ADMIN) { ?>
                                <a href="<?php echo  url('/student/outStanding').'?grade='.$grade ?>" class="btn btn-primary"> Oustanding Ledger</a>
                                <?php } ?>
                            </div>
                            <div class="panel-body">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Học Sinh</th>
                                        <th>Lớp ở Văn Khoa</th>
                                        <th>Ngày Sinh</th>
                                        <th>Điện Thoại Nhà</th>
                                        <th>Điện Thoại Di Động</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $value){ ?>
                                    <tr>
                                        <td>{{ \App\Http\Controllers\StudentController::generalID($value->id) }}</td>
                                        <td>{{ $value->last_name." ".$value->middle_name." ".$value->first_name }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ date("d-m-Y", strtotime($value->birthday ))}}</td>
                                        <td>{{ $value->home_phone }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <th>
                                            <a title="View" href="{{ url('/student/view/' . $value->id) }}"><i class="fa fa-eye"></i></a>
                                            <?php if (Auth::User()->role == \App\User::ROLE_ADMIN) { ?>
                                            <a title="Delete" class="action-delete" href="{{ url('/student/delete/' . $value->id) }}"><i class="fa fa-trash-o"></i></a>
                                            <?php } ?>
                                            <a title="Update" href="{{ url('/student/update/' . $value->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                        </th>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

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