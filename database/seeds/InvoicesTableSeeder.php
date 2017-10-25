<?php

use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            App\Invoices::create([
                'invoice_no' => str_random(),
                'expired_date' => date('Y-m-d'),
                'student_id' => rand(5, 100)
            ]);
        }
    }
}
