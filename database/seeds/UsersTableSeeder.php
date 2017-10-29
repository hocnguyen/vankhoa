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
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'passwordpharse' => 'concobebe',
            'firstname' => 'Admin',
            'lastname' => 'Nguyen',
            'phone' => '+842222' . rand(100, 999),
            'branch' => 1,
            'role' => 0,
            'is_active' => 1,
            'remember_token' => rand(100, 1000000)
        ]);
    }
}
