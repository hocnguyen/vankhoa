<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('name_at_school');
            $table->string('vns');
            $table->date('birthday');
            $table->integer('gender');
            $table->integer('student_type');
            $table->string('sickness');
            $table->string('medicare_no');
            $table->string('home_address');
            $table->string('home_phone',15);
            $table->string('phone',15);
            $table->string('school_name');
            $table->string('school_address');
            $table->string('campus');
            $table->string('year_level_in_day_school',5);
            $table->integer('is_over_seas_student');
            $table->integer('is_temporary_visa');
            $table->integer('is_vsl');
            $table->string('address_vsl')->nullable();
            $table->string('languages_vsl')->nullable();
            $table->integer('branch');
            $table->string('mom_name',100);
            $table->string('dad_name',100);
            $table->string('mom_phone',15);
            $table->string('dad_phone',15);
            $table->string('dad_email');
            $table->string('mom_email');
            $table->string('guardian_name');
            $table->string('relation');
            $table->string('guardian_phone');
            $table->date('date');
            $table->integer('grade_id')->unsigned();
            $table->timestamps();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
