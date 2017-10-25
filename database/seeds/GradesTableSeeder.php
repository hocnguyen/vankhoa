<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            App\Grades::create([
                'name' => str_random(),
                'school_year' => 2017,
                'number_student' => rand(100, 999),
                'branch' => rand(1, 2),
                'user_id' => rand(2,5),
                'status' => 1,
            ]);
        }
    }
}
