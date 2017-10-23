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
                            <div class="panel-heading text-right">
                                <a href="{{ url('/user/create') }}" class="btn btn-primary"> Thêm Mới Người Dùng</a>
                            </div>
                            <div class="panel-body">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Tên người dùng</th>
                                        <th>Tên đầy đủ </th>
                                        <th>Số địện thoại</th>
                                        <th>Chi nhánh</th>
                                        <th>Trạng Thái</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($users as $value){
                                        $in_active = "";
                                        if ($value->is_active == User::STATUS_INACTIVE) {
                                            $in_active = "style=background-color:#dedede";
                                        }
                                    ?>
                                    <tr {{ $in_active }} >
                                        <td>{{ \App\Http\Controllers\Controller::generalID($value->id) }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->username }}</td>
                                        <td>{{ $value->firstname . ' ' . $value->lastname }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ User::$branchs[$value->branch] }}</td>
                                        <td><?php echo ($value->is_active == User::STATUS_ACTIVE) ? "Active" : "In Active" ?></td>

                                        <th>
                                            <a title="Chi Tiết" href="{{ url('/user/view/' . $value->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="action-delete" title="Delete User"href="{{ url('/user/delete/' . $value->id) }}"><i class="fa fa-trash-o"></i></a>
                                            <a title="Cập Nhật" href="{{ url('/user/update/' . $value->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                            <a title="Đổi Mật Khẩu" href="{{ url('/user/changepass/' . $value->id) }}"><i class="fa fa-lock"></i></a>
                                            @if(Auth::User()->role == User::ROLE_ADMIN)
                                            <a title="Đổi Pass Pharse" href="{{ url('/user/changepasspharse/' . $value->id) }}"><i class="fa fa-unlock-alt "></i></a>
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