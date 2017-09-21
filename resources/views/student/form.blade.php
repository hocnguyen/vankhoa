 <?php
use App\User;
?>
@extends('layouts.main')
@section('title','Create Student')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header center-text title-style">
                    VĂN KHOA VIETNAMESE LANGUAGE SCHOOL 2017 Student Enrolment
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $error }}
                    </div>
                @endforeach
            </div>
            {{ Form::open(array('url' => ($model->exists?'/student/update/' .$model->id:'/student/create') , 'method' => 'post')) }}
            {{ csrf_field() }}
                <div class="title-sub">Lý Lịch Học Sinh ‐ Student Details</div>
                <div class="col-lg-12">
                    <label class="fix-space-lbl">Chi Nhánh Văn Khoa ( Campus )</label>
                    <label for="albans">St. Albans</label>
                    <input class="fix-space-lbl" type="radio" name="branch" id="albans" value="0"/>
                    <label for="yarra">South Yarra</label>
                    <input class="fix-space-lbl" type="radio" name="branch" id="yarra" value="1" />
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Họ ( surname )</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Họ " />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên  ( first name )</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Tên "/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên đệm ( middle names )</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Tên đệm " />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên học sinh đăng ký ở trường Úc ( registered name at Day School )</label>
                        <input type="text" name="name_at_school" class="form-control" placeholder="Tên học sinh đăng ký ở trường Úc " />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >VSN</label>
                        <input type="text" name="vns" class="form-control" placeholder="VNS " />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Ngày tháng năm sinh ( Date of birth )</label>
                        <input type="text" name="birthday" class="form-control" placeholder="Ngày tháng năm sinh " />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="fix-space-lbl">Giới tính ( gender )</label>
                        <input type="radio" name="gender" id="nam" value="0"/>
                        <label class="fix-space-lbl" for="nam">Nam</label>
                        <input type="radio" name="gender" id="nu" value="1"/>
                        <label for="nu">Nữ</label>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="old" >Học sinh cũ (existing student)</label>
                        <input class="fix-space-lbl" type="radio" name="student_type" id="old" value="0"/>
                        <label for="new" >HS mới (new student)</label>
                        <input type="radio" name="student_type" id="new" value="1"/>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Lớp ở trường Văn Khoa (grade at Văn Khoa)</label>
                        <select name="grade_id" class="form-control">
                            <option>Chọn Lớp ở trường Văn Khoa</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Medicare No.</label>
                        <input type="text" name="medicare_no" class="form-control" placeholder="Medicare No." />
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label >Có bị dị ứng / bệnh suyễn / cá tính đặc biệt / bệnh nào không? Xin cho biết (Specify any allergies / sickness)</label>
                        <textarea name="sickness" class="form-control" ></textarea>
                    </div>
                </div>

                {{-- add anh chi em --}}

                <div class="col-lg-12">
                    <div class="form-group">
                        <label >Địa chỉ nhà (Home Address)</label>
                        <textarea name="home_address" class="form-control" ></textarea>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Điện thoại nhà (Home telephone)</label>
                        <input type="text" name="home_phone" class="form-control" placeholder="Điện thoại nhà " />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Mobile học sinh (student’s mobile no.)</label>
                        <input type="text" name="phone" class="form-control" placeholder="Mobile học sinh " />
                    </div>
                </div>
                <div class="title-sub">Trường chính mạch của học sinh ‐ Mainstream/Day School (attended by student) in 2017:</div>

                <div class="col-lg-12">
                    <div style="text-align: center">
                        <?php echo Form::button( ($model->exists?'Update':'Create') , ['type' => 'submit', 'class' => 'btn btn-success']); ?>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection