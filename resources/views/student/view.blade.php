<?php
use App\User;
?>
@extends('layouts.main')
@section('title','Thông tin chi tiết Học Sinh ')
@section('content')
    <div id="page-wrapper">
        <div class="row view-std">

            <div class="title-sub">Lý Lịch Học Sinh ‐ Student Details</div>
            <div class="col-lg-12">
                <label class="fix-space-lbl">Chi Nhánh Văn Khoa ( Campus )</label>
                <label for="albans">St. Albans</label>
                <?php echo Form::radio('branch', User::$branchs[1], ($model->branch == User::$branchs[1]) ? true : "", ['class' => 'fix-space-lbl', 'readonly']); ?>
                <label for="yarra">South Yarra</label>
                <?php echo Form::radio('branch', User::$branchs[2], ($model->branch == User::$branchs[2]) ? true : "", ['class' => 'fix-space-lbl', 'readonly']); ?>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Họ ( surname )</label>
                    <?php echo Form::label('', $model->last_name, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Tên  ( first name )</label>
                    <?php echo Form::label('', $model->first_name, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Tên đệm ( middle names )</label>
                    <?php echo Form::label('', $model->middle_name, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Tên học sinh đăng ký ở trường Úc ( registered name at Day School )</label>
                    <?php echo Form::label('', $model->name_at_school, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >VSN</label>
                    <?php echo Form::label('', $model->vns, ['class' => 'form-control']); ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label >Ngày tháng năm sinh ( Date of birth )</label>
                    <?php echo Form::label('', $model->birthday, ['class' => 'form-control']); ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="fix-space-lbl">Giới tính ( gender )</label>
                    <?php
                        if ($model->gender == 2) {
                            echo '<label class="fix-space-lbl" for="nam">Nam</label>';
                        } else {
                            echo ' <label for="nu">Nữ</label>';
                        }
                    ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <?php
                    if ($model->student_type == 2) {
                        echo '<label class="fix-space-lbl" >Học sinh cũ (existing student)</label>';
                    } else {
                        echo ' <label class="fix-space-lbl"  >HS mới (new student)</label>';
                    }
                    ?>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label >Lớp ở trường Văn Khoa (grade at Văn Khoa)</label>
                    <?php
                        echo Form::label("",$model->name,['class'=> 'form-control']);
                    ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label >Medicare No.</label>
                    <?php echo Form::label('', $model->medicare_no, ['class' => 'form-control']); ?>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label >Có bị dị ứng / bệnh suyễn / cá tính đặc biệt / bệnh nào không? Xin cho biết (Specify any allergies / sickness)</label>
                    <?php echo Form::textarea('sickness', $model->sickness, ['class' => 'form-control',"readonly"]); ?>
                </div>
            </div>
            <?php
            if (count($siblings) > 0) {
            $key = 0;
            foreach ($siblings as $item) {
            $key++;
            ?>
            <div class="col-lg-6">
                <div class="form-group">
                    <?php if ($key == 1 ) { echo "<label >Họ tên anh chị em (siblings’ names) </label>" ; } ?>
                    <?php echo Form::label(''.$key, $item->full_name, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <?php if ($key == 1 ) { echo " <label >Lớp (Grade) </label>" ; } ?>
                    <?php echo Form::label(''.$key, $item->grade_year, ['class' => 'form-control']); ?>
                </div>
            </div>
            <?php   }
            } ?>

            <div class="col-lg-12">
                <div class="form-group">
                    <label >Địa chỉ nhà (Home Address)</label>
                    <?php echo Form::label('', $model->home_address, ['class' => 'form-control']); ?>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label >Điện thoại nhà (Home telephone)</label>
                    <?php echo Form::label('', $model->home_phone, ['class' => 'form-control']); ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label >Mobile học sinh (student’s mobile no.)</label>
                    <?php echo Form::label('', $model->phone, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="title-sub">Trường chính mạch của học sinh ‐ Mainstream/Day School (attended by student) in 2017:</div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label >Tên trường (school name)</label>
                    <?php echo Form::label('school_name', $model->school_name, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Lớp ở trường Úc 2017 (Year Level in day school)</label>
                    <?php echo Form::label('year_level_in_day_school', $model->year_level_in_day_school, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="fix-col-lg-6">
                    <div class="form-group">
                        <label >Campus</label>
                        <?php echo Form::label('campus', $model->campus, ['class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label >Địa chỉ trường (Day School Campus/Address)</label>
                    <?php echo Form::textarea('school_address', $model->school_address, ['class' => 'form-control', "readonly"]); ?>
                </div>
            </div>

            <div class="col-lg-12">
                <label class="fix-space-lbl">Có phải là du học sinh không? (Is the student an overseas full fee‐paying student?)</label>
                <label for="yes_over">Yes</label>
                <?php echo Form::radio('is_over_seas_student', 1, ($model->is_over_seas_student == 1) ? true : "", ['class' => 'fix-space-lbl', 'readonly']); ?>
                <label for="no_over">No</label>
                <?php echo Form::radio('is_over_seas_student', 2, ($model->is_over_seas_student == 2) ? true : "", ['class' => 'fix-space-lbl', 'readonly']); ?>
            </div>

            <div class="col-lg-12">
                <label class="fix-space-lbl" style="margin-right: 63px!important;">Học sinh có tạm trú Visa ngắn hạn? (Does the student hold a temporary visa?)</label>
                <label for="yes_visa">Yes</label>
                <?php echo Form::radio('is_temporary_visa', 1, ($model->is_temporary_visa == 1) ? true : "", ['class' => 'fix-space-lbl', 'readonly']); ?>
                <label for="no_visa">No</label>
                <?php echo Form::radio('is_temporary_visa', 2, ($model->is_temporary_visa == 2) ? true : "", ['class' => 'fix-space-lbl', 'readonly']); ?>

            </div>

            <div class="col-lg-12">
                <label class="fix-space-lbl" style="margin-right: 109px!important;">Học sinh có học tiếng Việt hoặc ngôn ngữ khác ở trường VSL không? </br>(Does the student attend the Victorian School of Languages VSL?)</label>
                <label for="yes_vsl">Yes</label>
                <?php echo Form::radio('is_vsl', 1, ($model->is_vsl == 1) ? true : "", ['class' => 'fix-space-lbl', 'readonly']); ?>
                <label for="no_vsl">No</label>
                <?php echo Form::radio('is_vsl', 2, ($model->is_vsl == 2) ? true : "", ['class' => 'fix-space-lbl', 'readonly']); ?>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Nếu có, viết địa điểm VSL (If YES, VSL Centre location)</label>
                    <?php echo Form::label('address_vsl', $model->address_vsl, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Học ngôn ngữ nào? (Language studied)</label>
                    <?php echo Form::label('languages_vsl', $model->languages_vsl, ['class' => 'form-control']); ?>
                </div>
            </div>

            <div class="title-sub">CHI TIẾT PHỤ HUYNH (PARENTS’ DETAILS) hoặc NGƯỜI GIÁM HỘ (Guardian)</div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label >Họ tên của mẹ (Mum’s full name)</label>
                    <?php echo Form::label('mom_name', $model->mom_name, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Họ tên của ba (Dad’s full name)</label>
                    <?php echo Form::label('dad_name', $model->dad_name, ['class' => 'form-control']); ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label >Mobile number (mẹ ‐ mum’s)</label>
                    <?php echo Form::label('mom_phone', $model->mom_phone, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Mobile number (Ba – dad’s)</label>
                    <?php echo Form::label('dad_phone', $model->dad_phone, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Email address (mẹ ‐ mum’s)</label>
                    <?php echo Form::label('mom_email', $model->mom_email, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Email address (ba ‐ dad’s)</label>
                    <?php echo Form::label('dad_email', $model->dad_email, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Tên phụ huynh / người giám hộ (Name of Parent/Guardian)</label>
                    <?php echo Form::label('guardian_name', $model->guardian_name, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Date</label>
                    <?php echo Form::label('date', $model->date, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Quan hệ (Relationship to student)</label>
                    <?php echo Form::label('relation', $model->relation, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label >Số điện thoại mobile</label>
                    <?php echo Form::label('guardian_phone', $model->guardian_phone, ['class' => 'form-control']); ?>
                </div>
            </div>
            <?php
            if(0 < count($invoices)){
                foreach ($invoices as $key=>$val){ $i = $key + 1; ?>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label >SỐ BIÊN LAI <?php echo $i; ?> (RECEIPT NO.<?php echo $i; ?>)</label>
                            <?php echo Form::label('invoice_no', $val->invoice_no, ['class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label >Ngày hết hạn <?php echo $i; ?> (Expired Date.<?php echo $i; ?>)</label>
                            <?php echo Form::label('expired_date', $val->expired_date, ['class' => 'form-control']); ?>
                        </div>
                    </div>
                <?php
                }
            }?>
            <div class="col-lg-12">
                <div style="text-align: center">
                    <a href="/students" class="btn btn-success">Trở Lại Danh Sách Học Sinh</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $(':radio').click(function(){
                return false;
            });
        })
    </script>
@endsection

