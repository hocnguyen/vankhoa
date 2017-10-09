<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i< 100; $i++) {
            DB::table('students')->insert([
                'first_name' => str_random(10),
                'last_name' => str_random(10),
                'middle_name' => str_random(10),
                'name_at_school' => str_random(10),
                'vns' => str_random(10),
                'birthday' => date('Y-m-d H:m:s'),
                'gender' => rand(0, 1),
                'student_type' => rand(1, 5),
                'sickness' => str_random(10),
                'medicare_no' => str_random(10),
                'home_address' => str_random(10),
                'home_phone' => '+84' . rand(100000000, 999999999),
                'phone' => '+84' . rand(100000000, 999999999),
                'school_name' => str_random(10),
                'school_address' => str_random(10),
                'campus' => str_random(10),
                'year_level_in_day_school' => str_random(10),
                'is_over_seas_student' => rand(50, 100),
                'is_temporary_visa' => rand(50, 100),
                'is_vsl' => rand(50, 100),
                'address_vsl' => rand(50, 100),
                'branch' => str_random(10),
                'mom_name' => str_random(10),
                'dad_name' => str_random(10),
                'mom_phone' => str_random(10),
                'dad_phone' => str_random(10),
                'mom_email' => str_random(10) . '@gmail.com',
                'dad_email' => str_random(10) . '@gmail.com',
                'guardian_name' => str_random(10),
                'relation' => str_random(10),
                'guardian_phone' => str_random(10),
                'invoice_no' => rand(100000, 999999),
                'grade_id' => rand(1, 9),
            ]);
        }
    }
}
