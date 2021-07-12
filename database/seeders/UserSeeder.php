<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => Str::random(10),
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Admin'
            ],
            [
                'name' => Str::random(10),
                'email' => 'student@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Student'
            ],
            [
                'name' => Str::random(10),
                'email' => 'supervisor@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Supervisor'
            ]
        );
    }
}
