<?php
use App\Students;
use App\Grades;
use App\User;
?>
@extends('layouts.main')
@section('title','Trang chủ')
@section('content')
    <div id="page-wrapper" style="min-height: 346px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">

            <!-- /.row -->
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                                if (Auth::User()->role == \App\User::ROLE_ADMIN){
                                                    $data = DB::table($student)
                                                            ->join('grades','grades.id', '=', $student.'.grade_id')
                                                            ->where('grades.school_year', "=", \App\Http\Controllers\Controller::getYear() )
                                                            ->get();
                                                } else {
                                                    $data = DB::table($student)
                                                            ->join('grades','grades.id', '=', $student.'.grade_id')
                                                            ->where('grades.user_id', "=", Auth::User()->id)
                                                            ->where('grades.school_year', "=", \App\Http\Controllers\Controller::getYear() )
                                                            ->get();
                                                }

                                            echo count($data);
                                            ?>
                                        </div>
                                        <div>Students</div>
                                    </div>
                                </div>
                            </div>
                            <a href="/student/formList">
                                <div class="panel-footer">
                                    <span class="pull-left">Danh Sách Học Sinh</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @if(Auth::User()->role == \App\User::ROLE_ADMIN)
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-street-view fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $teachers = DB::table('users')
                                                    ->where("is_active",User::STATUS_ACTIVE)
                                                    ->where("role",User::ROLE_TEACHER)
                                                    ->get();
                                            ?>
                                            {{ count($teachers)}}
                                        </div>
                                        <div>Teachers</div>
                                    </div>
                                </div>
                            </div>
                            <a href="/users">
                                <div class="panel-footer">
                                    <span class="pull-left">Danh Sách Giáo Viên</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $data = DB::table('grades')
                                                    ->where('grades.school_year', "=", \App\Http\Controllers\Controller::getYear() )
                                                    ->get();
                                            echo count($data);
                                            ?>

                                        </div>
                                        <div>Grades</div>
                                    </div>
                                </div>
                            </div>
                            <a href="/grades">
                                <div class="panel-footer">
                                    <span class="pull-left">Danh Sách Lớp Học</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-4 col-md-6" style="text-align: center; margin-top: -20px">
                        <img  src="{{ asset(config('app.themes').'/image/vk.jpg') }}">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-clock-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">

                                        </div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <a href="/attendances">
                                <div class="panel-footer">
                                    <span class="pull-left">Điểm Danh</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    @endif



                </div>
                
                <!-- /.row -->

            </div>

            <!-- /.col-lg-4 -->


        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection