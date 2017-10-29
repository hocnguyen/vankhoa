<?php
use App\Grades;
?>
@extends('layouts.main')
@section('title','Học Bạ Văn Khoa')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Học Bạ Văn Khoa</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-right">
                                <?php if (\App\Http\Controllers\Controller::getYear() == date('Y')) {
                                    if (count($invoice) > 0) { ?>
                                <label style="color: #843534">Không thể end of year vì chưa thu học phí đầy đủ.</label>
                                        <a href="#"  class="disabled btn btn-primary "> End Of Year <?php echo \App\Http\Controllers\Controller::getYear() ?></a>
                                <?php     } else { ?>
                                        <a href="<?php echo  url('/confirmEndYear') ?>" class="btn btn-primary"> End Of Year <?php echo \App\Http\Controllers\Controller::getYear() ?></a>
                                <?php } } else { ?>
                                    <a href="<?php echo  url('/backCurrent') ?>" class="btn btn-primary"> Về lại niên khoá <?php echo date('Y') ?></a>
                                <?php  } ?>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <?php
                                    if (count($years) > 0 ) { ?>
                                    {{ Form::open(array('url' => '/get_history' , 'method' => 'post', 'id' => 'vankhoa_list'))}}

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            @if (\Session::has('msg'))
                                                <label style="color: red">{!! \Session::get('msg') !!}</label>
                                            @endif
                                            <br/>
                                            <label>Niên Khoá </label>
                                            <select name="year" class="form-control year_list" >
                                                <?php
                                                    foreach($years as $key => $item){
                                                        echo  '<option value="'.$item->year.'">'.$item->year.'</option>';
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <div style="text-align: center">
                                            <label class="error_msg"></label> <br/>
                                            <button type="submit" class="btn btn-success find_student"> Hiển Thị Thông Tin</button>

                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection