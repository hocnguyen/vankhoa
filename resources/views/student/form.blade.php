 <?php
?>
@extends('layouts.main')
@section('title','Ghi Danh Hoc Sinh')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

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
                    <?php echo Form::radio('branch', 1, ($model->branch == 1) ? true : "", ['class' => 'fix-space-lbl', 'id' => 'albans']); ?>
                    <label for="yarra">South Yarra</label>
                    <?php echo Form::radio('branch', 2, ($model->branch == 2) ? true : "", ['class' => 'fix-space-lbl', 'id' => 'yarra']); ?>
                    @if ($errors->has('branch'))
                        <div class="invalid error_msg">{{ $errors->first('branch') }}</div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Họ ( surname )</label>
                        <?php echo Form::text('last_name', $model->last_name, ['class' => 'form-control', 'placeholder' => 'Họ']); ?>
                        @if ($errors->has('last_name'))
                            <div class="invalid error_msg">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên  ( first name )</label>
                        <?php echo Form::text('first_name', $model->first_name, ['class' => 'form-control', 'placeholder' => 'Tên']); ?>
                        @if ($errors->has('first_name'))
                            <div class="invalid error_msg">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên đệm ( middle names )</label>
                        <?php echo Form::text('middle_name', $model->middle_name, ['class' => 'form-control', 'placeholder' => 'Tên đệm']); ?>
                        @if ($errors->has('middle_name'))
                            <div class="invalid error_msg">{{ $errors->first('middle_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên học sinh đăng ký ở trường Úc ( registered name at Day School )</label>
                        <?php echo Form::text('name_at_school', $model->name_at_school, ['class' => 'form-control', 'placeholder' => 'Tên học sinh đăng ký ở trường Úc']); ?>
                        @if ($errors->has('name_at_school'))
                            <div class="invalid error_msg">{{ $errors->first('name_at_school') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >VSN</label>
                        <?php echo Form::text('vns', $model->vns, ['class' => 'form-control', 'placeholder' => 'VNS']); ?>
                        @if ($errors->has('vns'))
                            <div class="invalid error_msg">{{ $errors->first('vns') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Ngày tháng năm sinh ( Date of birth )</label>
                        <?php echo Form::text('birthday', $model->birthday, ['class' => 'form-control', 'placeholder' => 'Ngày tháng năm sinh ', 'id' => 'birthday']); ?>
                        @if ($errors->has('birthday'))
                            <div class="invalid error_msg">{{ $errors->first('birthday') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="fix-space-lbl">Giới tính ( gender )</label>
                        <?php echo Form::radio('gender', 2, ($model->gender == 2) ? true : "", [ 'id' => 'nam']); ?>
                        <label class="fix-space-lbl" for="nam">Nam</label>
                        <?php echo Form::radio('gender', 1, ($model->gender == 1) ? true : "", [ 'id' => 'nu']); ?>
                        <label for="nu">Nữ</label>
                        @if ($errors->has('gender'))
                            <div class="invalid error_msg">{{ $errors->first('gender') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="old" >Học sinh cũ (existing student)</label>
                        <?php echo Form::radio('student_type', 2, ($model->student_type == 2) ? true : "", ['class' => 'fix-space-lbl', 'id' => 'old']); ?>
                        <label for="new" >HS mới (new student)</label>
                        <?php echo Form::radio('student_type', 1, ($model->student_type == 1) ? true : "", [ 'id' => 'new']); ?>
                        @if ($errors->has('student_type'))
                            <div class="invalid error_msg">{{ $errors->first('student_type') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Lớp ở trường Văn Khoa (grade at Văn Khoa)</label>
                        <?php
                        $grades = [];
                        foreach ($grade as $item)
                        {
                            $grades[$item->id]  = $item->name;
                        }
                        echo Form::select("grade_id",[$grades],$model->grade_id,['class'=> 'form-control']);
                        ?>
                        @if ($errors->has('grade_id'))
                            <div class="invalid error_msg">{{ $errors->first('grade_id') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Medicare No.</label>
                        <?php echo Form::text('medicare_no', $model->medicare_no, ['class' => 'form-control', 'placeholder' => 'Medicare No.']); ?>
                        @if ($errors->has('medicare_no'))
                            <div class="invalid error_msg">{{ $errors->first('medicare_no') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label >Có bị dị ứng / bệnh suyễn / cá tính đặc biệt / bệnh nào không? Xin cho biết (Specify any allergies / sickness)</label>
                        <?php echo Form::textarea('sickness', $model->sickness, ['class' => 'form-control']); ?>
                        @if ($errors->has('sickness'))
                            <div class="invalid error_msg">{{ $errors->first('sickness') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Họ tên anh chị em (siblings’ names) </label>
                        <?php echo Form::text('full_name1', $sibling->full_name1, ['class' => 'form-control']); ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Lớp (Grade) </label>
                        <?php echo Form::text('grade_year1', $sibling->grade_year1, ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo Form::text('full_name2', $sibling->full_name2, ['class' => 'form-control']); ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo Form::text('grade_year2', $sibling->grade_year2, ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo Form::text('full_name3', $sibling->full_name3, ['class' => 'form-control']); ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo Form::text('grade_year3', $sibling->grade_year3, ['class' => 'form-control']); ?>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label >Địa chỉ nhà (Home Address)</label>
                        <?php echo Form::textarea('home_address', $model->home_address, ['class' => 'form-control']); ?>
                        @if ($errors->has('home_address'))
                            <div class="invalid error_msg">{{ $errors->first('home_address') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Điện thoại nhà (Home telephone)</label>
                        <?php echo Form::text('home_phone', $model->home_phone, ['class' => 'form-control', 'placeholder' => 'Điện thoại nhà ']); ?>
                        @if ($errors->has('home_phone'))
                            <div class="invalid error_msg">{{ $errors->first('home_phone') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Mobile học sinh (student’s mobile no.)</label>
                        <?php echo Form::text('phone', $model->phone, ['class' => 'form-control', 'placeholder' => 'Mobile học sinh']); ?>
                        @if ($errors->has('phone'))
                            <div class="invalid error_msg">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>
                <div class="title-sub">Trường chính mạch của học sinh ‐ Mainstream/Day School (attended by student) in 2017:</div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên trường (school name)</label>
                        <?php echo Form::text('school_name', $model->school_name, ['class' => 'form-control', 'placeholder' => 'Tên trường']); ?>
                        @if ($errors->has('school_name'))
                            <div class="invalid error_msg">{{ $errors->first('school_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Lớp ở trường Úc 2017 (Year Level in day school)</label>
                        <?php echo Form::text('year_level_in_day_school', $model->year_level_in_day_school, ['class' => 'form-control', 'placeholder' => 'Lớp ở trường Úc 2017']); ?>
                        @if ($errors->has('year_level_in_day_school'))
                            <div class="invalid error_msg">{{ $errors->first('year_level_in_day_school') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="fix-col-lg-6">
                        <div class="form-group">
                            <label >Campus</label>
                            <?php echo Form::text('campus', $model->campus, ['class' => 'form-control', 'placeholder' => 'Campus']); ?>
                            @if ($errors->has('campus'))
                                <div class="invalid error_msg">{{ $errors->first('campus') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label >Địa chỉ trường (Day School Campus/Address)</label>
                        <?php echo Form::textarea('school_address', $model->school_address, ['class' => 'form-control']); ?>
                        @if ($errors->has('school_address'))
                            <div class="invalid error_msg">{{ $errors->first('school_address') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-12">
                    <label class="fix-space-lbl">Có phải là du học sinh không? (Is the student an overseas full fee‐paying student?)</label>
                    <label for="yes_over">Yes</label>
                    <?php echo Form::radio('is_over_seas_student', 1, ($model->is_over_seas_student == 1) ? true : "", ['class' => 'fix-space-lbl', 'id' => 'yes_over']); ?>
                    <label for="no_over">No</label>
                    <?php echo Form::radio('is_over_seas_student', 2, ($model->is_over_seas_student == 2) ? true : "", ['class' => 'fix-space-lbl', 'id' => 'no_over']); ?>
                    @if ($errors->has('is_over_seas_student'))
                        <div class="invalid error_msg">{{ $errors->first('is_over_seas_student') }}</div>
                    @endif
                </div>

                <div class="col-lg-12">
                    <label class="fix-space-lbl" style="margin-right: 63px!important;">Học sinh có tạm trú Visa ngắn hạn? (Does the student hold a temporary visa?)</label>
                    <label for="yes_visa">Yes</label>
                    <?php echo Form::radio('is_temporary_visa', 1, ($model->is_ovis_temporary_visaer_seas_student == 1) ? true : "", ['class' => 'fix-space-lbl', 'id' => 'yes_visa']); ?>
                    <label for="no_visa">No</label>
                    <?php echo Form::radio('is_temporary_visa', 2, ($model->is_ovis_temporary_visaer_seas_student == 2) ? true : "", ['class' => 'fix-space-lbl', 'id' => 'no_visa']); ?>
                    @if ($errors->has('is_temporary_visa'))
                        <div class="invalid error_msg">{{ $errors->first('is_temporary_visa') }}</div>
                    @endif
                </div>

                <div class="col-lg-12">
                    <label class="fix-space-lbl" style="margin-right: 109px!important;">Học sinh có học tiếng Việt hoặc ngôn ngữ khác ở trường VSL không? </br>(Does the student attend the Victorian School of Languages VSL?)</label>
                    <label for="yes_vsl">Yes</label>
                    <?php echo Form::radio('is_vsl', 1, ($model->is_vsl == 1) ? true : "", ['class' => 'fix-space-lbl', 'id' => 'yes_vsl']); ?>
                    <label for="no_vsl">No</label>
                    <?php echo Form::radio('is_vsl', 2, ($model->is_vsl == 2) ? true : "", ['class' => 'fix-space-lbl', 'id' => 'no_vsl']); ?>
                    @if ($errors->has('is_vsl'))
                        <div class="invalid error_msg">{{ $errors->first('is_vsl') }}</div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Nếu có, viết địa điểm VSL (If YES, VSL Centre location)</label>
                        <?php echo Form::text('address_vsl', $model->address_vsl, ['class' => 'form-control', 'placeholder' => "Địa Điểm VSL"]); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Học ngôn ngữ nào? (Language studied)</label>
                        <?php echo Form::text('languages_vsl', $model->languages_vsl, ['class' => 'form-control', 'placeholder' => "Học ngôn ngữ nào?"]); ?>
                    </div>
                </div>

                <div class="title-sub">CHI TIẾT PHỤ HUYNH (PARENTS’ DETAILS) hoặc NGƯỜI GIÁM HỘ (Guardian)</div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Họ tên của mẹ (Mum’s full name)</label>
                        <?php echo Form::text('mom_name', $model->mom_name, ['class' => 'form-control', 'placeholder' => "Họ tên của mẹ "]); ?>
                        @if ($errors->has('mom_name'))
                            <div class="invalid error_msg">{{ $errors->first('mom_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Họ tên của ba (Dad’s full name)</label>
                        <?php echo Form::text('dad_name', $model->dad_name, ['class' => 'form-control', 'placeholder' => "Họ tên của ba "]); ?>
                        @if ($errors->has('dad_name'))
                            <div class="invalid error_msg">{{ $errors->first('dad_name') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Mobile number (mẹ ‐ mum’s)</label>
                        <?php echo Form::text('mom_phone', $model->mom_phone, ['class' => 'form-control', 'placeholder' => "Mobile number "]); ?>
                        @if ($errors->has('mom_phone'))
                            <div class="invalid error_msg">{{ $errors->first('mom_phone') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Mobile number (Ba – dad’s)</label>
                        <?php echo Form::text('dad_phone', $model->dad_phone, ['class' => 'form-control', 'placeholder' => "Mobile number"]); ?>
                        @if ($errors->has('dad_phone'))
                            <div class="invalid error_msg">{{ $errors->first('dad_phone') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Email address (mẹ ‐ mum’s)</label>
                        <?php echo Form::text('mom_email', $model->mom_email, ['class' => 'form-control', 'placeholder' => "Email address "]); ?>
                        @if ($errors->has('mom_email'))
                            <div class="invalid error_msg">{{ $errors->first('mom_email') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Email address (ba ‐ dad’s)</label>
                        <?php echo Form::text('dad_email', $model->dad_email, ['class' => 'form-control', 'placeholder' => "Email address "]); ?>
                        @if ($errors->has('dad_email'))
                            <div class="invalid error_msg">{{ $errors->first('dad_email') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Tên phụ huynh / người giám hộ (Name of Parent/Guardian)</label>
                        <?php echo Form::text('guardian_name', $model->guardian_name, ['class' => 'form-control', 'placeholder' => "Tên phụ huynh / người giám hộ "]); ?>
                        @if ($errors->has('guardian_name'))
                            <div class="invalid error_msg">{{ $errors->first('guardian_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Date</label>
                        <?php echo Form::text('date', $model->date, ['class' => 'form-control', 'placeholder' => "Date", 'id' => 'date_sign']); ?>
                        @if ($errors->has('date'))
                            <div class="invalid error_msg">{{ $errors->first('date') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Quan hệ (Relationship to student)</label>
                        <?php echo Form::text('relation', $model->relation, ['class' => 'form-control', 'placeholder' => "Quan hệ "]); ?>
                        @if ($errors->has('relation'))
                            <div class="invalid error_msg">{{ $errors->first('relation') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >Số điện thoại mobile</label>
                        <?php echo Form::text('guardian_phone', $model->guardian_phone, ['class' => 'form-control', 'placeholder' => "Số điện thoại "]); ?>
                        @if ($errors->has('guardian_phone'))
                            <div class="invalid error_msg">{{ $errors->first('guardian_phone') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label >SỐ BIÊN LAI (RECEIPT NO.) </label>
                        <?php echo Form::text('invoice_no', $model->invoice_no, ['class' => 'form-control', 'placeholder' => "SỐ BIÊN LAI "]); ?>
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#birthday').datetimepicker({
            format: 'YYYY-MM-DD',
            ignoreReadonly: true
        });

        $('#date_sign').datetimepicker({
            format: 'YYYY-MM-DD',
            ignoreReadonly: true
        });
    })
</script>
@endsection