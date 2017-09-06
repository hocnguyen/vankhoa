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
        App\User::create([
            'username' => 'admin123',
            'email' =>'badman@gmail.com',
            'password' => bcrypt('12345678'),
            'passwordpharse' => '12345678',
            'firstname' => 'Tom',
            'lastname' => 'Jery',
            'phone' =>  '+8422222222',
            'branch' => 'CN1',
            'is_admin' => 1,
            'is_active' => 1,
            'remember_token' => rand(1000000, 100000000000)
        ]);
    }
}
