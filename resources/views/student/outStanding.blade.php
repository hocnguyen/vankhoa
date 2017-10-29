<?php
use App\Grades;
?>
@extends('layouts.main')
@section('title','Danh sách Học Sinh -  Students List Page')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Oustanding Ledger</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-right">
                                <a href="/students?branch=<?php echo $data[0]->branch ?>&grade=<?php echo $data[0]->grade_id ?>" class="btn btn-primary"> Trở Về Danh Sách Học Sinh</a>
                            </div>
                            <div class="panel-body">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Học Sinh</th>
                                        <th>Lớp</th>
                                        <th>Ngày Sinh</th>
                                        <th>Điện Thoại</th>
                                        <th>Term 1</th>
                                        <th>Term 2</th>
                                        <th>Term 3</th>
                                        <th>Term 4</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($data as $value){
                                    ?>
                                    <tr>
                                        <td>{{ \App\Http\Controllers\StudentController::generalID($value->id) }}</td>
                                        <td>{{ $value->last_name." ".$value->middle_name." ".$value->first_name }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->birthday }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <?php
                                        $invoices = DB::table('invoices')
                                        ->select('term', 'invoice_no','expired_date')
                                        ->where("student_id", $value->id)
                                        ->orderBy('term')
                                        ->get();
                                        if (!empty($invoices)) {
                                            for ($i =0; $i < 4; $i++ ) {
                                                if (!empty($invoices[$i]->invoice_no)) {
                                                    echo "<td style='background-color: greenyellow; text-align: center'>OK</td>";
                                                } elseif ((isset($invoices[$i]->expired_date)) && $invoices[$i]->expired_date < date("Y-m-d")) {
                                                    echo "<td style='background-color: red; text-align: center'>$</td>";
                                                }else {
                                                    echo "<td></td>";
                                                }
                                            }
                                        } else { ?>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        <?php } ?>
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
@endsection