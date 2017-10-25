<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 1; $i++) {
            App\User::create([
            'username' => 'admin',
            'email' => rand(100, 1000000) . 'badman@gmail.com',
            'password' => bcrypt('12345678'),
            'passwordpharse' => '12345678',
            'firstname' => 'Tom'. str_random(),
            'lastname' => 'Jery'. str_random(),
            'phone' =>  '+842222' . rand(100, 999),
            'branch' => rand(1, 2),
            'role' => rand(1, 2),
            'is_active' => 1,
            'remember_token' => rand(100, 1000000)
        ]);
        }
    }
}
