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
        for ($i=0; $i < 100; $i++) { 
            App\User::create([
            'username' => 'admin123',
            'email' => rand(100, 1000000) . 'badman@gmail.com',
            'password' => bcrypt('12345678'),
            'passwordpharse' => '12345678',
            'firstname' => 'Tom',
            'lastname' => 'Jery',
            'phone' =>  '+8422222222',
            'branch' => 'CN1',
            'role' => 0,
            'is_active' => 1,
            'remember_token' => rand(100, 1000000)
        ]);
        }
    }
}
