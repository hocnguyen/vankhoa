 <?php
use App\User;
?>
@extends('layouts.main')
@section('title','Ghi Danh Hoc Sinh')
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
            {{ Form::open(array('url' => ($model->exists?'/student/update/' .$model->id:'/student/enrolment') , 'method' => 'post')) }}
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
                        <input type="text" name="last_name" value="<?php echo $model->last_name ?>" class="form-control " placeholder="Họ " />
                        @if ($errors->has('last_name'))
                            <div class="invalid error_msg">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên  ( first name )</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Tên "/>
                        @if ($errors->has('first_name'))
                            <div class="invalid error_msg">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên đệm ( middle names )</label>
                        <input type="text" name="middle_name" class="form-control" placeholder="Tên đệm " />
                        @if ($errors->has('middle_name'))
                            <div class="invalid error_msg">{{ $errors->first('middle_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên học sinh đăng ký ở trường Úc ( registered name at Day School )</label>
                        <input type="text" name="name_at_school" class="form-control" placeholder="Tên học sinh đăng ký ở trường Úc " />
                        @if ($errors->has('name_at_school'))
                            <div class="invalid error_msg">{{ $errors->first('name_at_school') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >VSN</label>
                        <input type="text" name="vns" class="form-control" placeholder="VNS " />
                        @if ($errors->has('vns'))
                            <div class="invalid error_msg">{{ $errors->first('vns') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Ngày tháng năm sinh ( Date of birth )</label>
                        <input type="text" name="birthday" class="form-control" placeholder="Ngày tháng năm sinh " />
                        @if ($errors->has('birthday'))
                            <div class="invalid error_msg">{{ $errors->first('birthday') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="fix-space-lbl">Giới tính ( gender )</label>
                        <input type="radio" name="gender" id="nam" value="0"/>
                        <label class="fix-space-lbl" for="nam">Nam</label>
                        <input type="radio" name="gender" id="nu" value="1"/>
                        <label for="nu">Nữ</label>
                        @if ($errors->has('gender'))
                            <div class="invalid error_msg">{{ $errors->first('gender') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="old" >Học sinh cũ (existing student)</label>
                        <input class="fix-space-lbl" type="radio" name="student_type" id="old" value="0"/>
                        <label for="new" >HS mới (new student)</label>
                        <input type="radio" name="student_type" id="new" value="1"/>
                        @if ($errors->has('student_type'))
                            <div class="invalid error_msg">{{ $errors->first('student_type') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Lớp ở trường Văn Khoa (grade at Văn Khoa)</label>
                        <select name="grade_id" class="form-control">
                            <option></option>
                            <?php
                                foreach ($grade as $item)
                                {
                                    echo "<option value='".$item->id."'> ".$item->name."</option>";
                                }
                            ?>
                        </select>
                        @if ($errors->has('grade_id'))
                            <div class="invalid error_msg">{{ $errors->first('grade_id') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Medicare No.</label>
                        <input type="text" name="medicare_no" class="form-control" placeholder="Medicare No." />
                        @if ($errors->has('medicare_no'))
                            <div class="invalid error_msg">{{ $errors->first('medicare_no') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label >Có bị dị ứng / bệnh suyễn / cá tính đặc biệt / bệnh nào không? Xin cho biết (Specify any allergies / sickness)</label>
                        <textarea name="sickness" class="form-control" ></textarea>
                        @if ($errors->has('sickness'))
                            <div class="invalid error_msg">{{ $errors->first('sickness') }}</div>
                        @endif
                    </div>
                </div>

                {{-- add anh chi em --}}

                <div class="col-lg-12">
                    <div class="form-group">
                        <label >Địa chỉ nhà (Home Address)</label>
                        <textarea name="home_address" class="form-control" ></textarea>
                        @if ($errors->has('home_address'))
                            <div class="invalid error_msg">{{ $errors->first('home_address') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Điện thoại nhà (Home telephone)</label>
                        <input type="text" name="home_phone" class="form-control" placeholder="Điện thoại nhà " />
                        @if ($errors->has('home_phone'))
                            <div class="invalid error_msg">{{ $errors->first('home_phone') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Mobile học sinh (student’s mobile no.)</label>
                        <input type="text" name="phone" class="form-control" placeholder="Mobile học sinh " />
                        @if ($errors->has('phone'))
                            <div class="invalid error_msg">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>
                <div class="title-sub">Trường chính mạch của học sinh ‐ Mainstream/Day School (attended by student) in 2017:</div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên trường (school name)</label>
                        <input type="text" name="school_name" class="form-control" placeholder="Tên trường" />
                        @if ($errors->has('school_name'))
                            <div class="invalid error_msg">{{ $errors->first('school_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Lớp ở trường Úc 2017 (Year Level in day school)</label>
                        <input type="text" name="year_level_in_day_school" class="form-control" placeholder="Lớp ở trường Úc 2017" />
                        @if ($errors->has('year_level_in_day_school'))
                            <div class="invalid error_msg">{{ $errors->first('year_level_in_day_school') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="fix-col-lg-6">
                        <div class="form-group">
                            <label >Campus</label>
                            <input type="text" name="campus" class="form-control" placeholder="Campus " />
                            @if ($errors->has('campus'))
                                <div class="invalid error_msg">{{ $errors->first('campus') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label >Địa chỉ trường (Day School Campus/Address)</label>
                        <textarea name="school_address" class="form-control" ></textarea>
                        @if ($errors->has('school_address'))
                            <div class="invalid error_msg">{{ $errors->first('school_address') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12">
                    <label class="fix-space-lbl">Có phải là du học sinh không? (Is the student an overseas full fee‐paying student?)</label>
                    <label for="yes_over">Yes</label>
                    <input class="fix-space-lbl" type="radio" name="is_over_seas_student" id="yes_over" value="0"/>
                    <label for="no_over">No</label>
                    <input class="fix-space-lbl" type="radio" name="is_over_seas_student" id="no_over" value="1" />
                    @if ($errors->has('is_over_seas_student'))
                        <div class="invalid error_msg">{{ $errors->first('is_over_seas_student') }}</div>
                    @endif
                </div>

                <div class="col-lg-12">
                    <label class="fix-space-lbl" style="margin-right: 63px!important;">Học sinh có tạm trú Visa ngắn hạn? (Does the student hold a temporary visa?)</label>
                    <label for="yes_visa">Yes</label>
                    <input class="fix-space-lbl" type="radio" name="is_temporary_visa" id="yes_visa" value="0"/>
                    <label for="no_visa">No</label>
                    <input class="fix-space-lbl" type="radio" name="is_temporary_visa" id="no_visa" value="1" />
                    @if ($errors->has('is_temporary_visa'))
                        <div class="invalid error_msg">{{ $errors->first('is_temporary_visa') }}</div>
                    @endif
                </div>

                <div class="col-lg-12">
                    <label class="fix-space-lbl" style="margin-right: 109px!important;">Học sinh có học tiếng Việt hoặc ngôn ngữ khác ở trường VSL không? </br>(Does the student attend the Victorian School of Languages VSL?)</label>
                    <label for="yes_vsl">Yes</label>
                    <input class="fix-space-lbl" type="radio" name="is_vsl" id="yes_vsl" value="0"/>
                    <label for="no_vsl">No</label>
                    <input class="fix-space-lbl" type="radio" name="is_vsl" id="no_vsl" value="1" />
                    @if ($errors->has('is_vsl'))
                        <div class="invalid error_msg">{{ $errors->first('is_vsl') }}</div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Nếu có, viết địa điểm VSL (If YES, VSL Centre location)</label>
                        <input type="text" name="address_vsl" class="form-control" placeholder="Địa Điểm VSL" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Học ngôn ngữ nào? (Language studied)</label>
                        <input type="text" name="languages_vsl" class="form-control" placeholder="Học ngôn ngữ nào?" />
                    </div>
                </div>

                <div class="title-sub">CHI TIẾT PHỤ HUYNH (PARENTS’ DETAILS) hoặc NGƯỜI GIÁM HỘ (Guardian)</div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Họ tên của mẹ (Mum’s full name)</label>
                        <input type="text" name="mom_name" class="form-control" placeholder="Họ tên của mẹ" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Họ tên của ba (Dad’s full name)</label>
                        <input type="text" name="dad_name" class="form-control" placeholder="Họ tên của ba" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Mobile number (mẹ ‐ mum’s)</label>
                        <input type="text" name="mom_phone" class="form-control" placeholder="Mobile number" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Mobile number (Ba – dad’s)</label>
                        <input type="text" name="dad_phone" class="form-control" placeholder="Mobile number" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Email address (mẹ ‐ mum’s)</label>
                        <input type="text" name="mom_email" class="form-control" placeholder="Email address" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Email address (ba ‐ dad’s)</label>
                        <input type="text" name="dad_email" class="form-control" placeholder="Email address" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên phụ huynh / người giám hộ (Name of Parent/Guardian)</label>
                        <input type="text" name="guardian_name" class="form-control" placeholder="Tên phụ huynh / người giám hộ " />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Date</label>
                        <input type="text" name="date" class="form-control" placeholder="Date" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Quan hệ (Relationship to student)</label>
                        <input type="text" name="relation" class="form-control" placeholder="Quan hệ" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Quan hệ (Relationship to student)</label>
                        <input type="text" name="relation" class="form-control" placeholder="Quan hệ" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Số điện thoại mobile</label>
                        <input type="text" name="guardian_phone" class="form-control" placeholder="Số điện thoại " />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >SỐ BIÊN LAI (RECEIPT NO.) </label>
                        <input type="text" name="invoice_no" class="form-control" placeholder="SỐ BIÊN LAI " />
                    </div>
                </div>
                <div class="col-lg-12">
                    <div style="text-align: center">
                        <?php echo Form::button( ($model->exists?'Cập Nhật':'Ghi Danh') , ['type' => 'submit', 'class' => 'btn btn-success']); ?>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection