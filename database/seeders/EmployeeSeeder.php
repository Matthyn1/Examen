<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Dummy data for testing employees and rights per Roles
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'Test@test.nl',
            'password' => Hash::make('TestTest'),
            'role_ID' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Algemeen',
            'email' => 'Test2@test.nl',
            'password' => Hash::make('TestTest2'),
            'role_ID' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Uitgifte',
            'email' => 'Test3@test.nl',
            'password' => Hash::make('TestTest3'),
            'role_ID' => 3,
        ]);

        DB::table('users')->insert([
            'name' => 'Verwerking',
            'email' => 'Test4@test.nl',
            'password' => Hash::make('TestTest4'),
            'role_ID' => 4,
        ]);
        DB::table('users')->insert([
            'name' => 'Inname',
            'email' => 'Test5@test.nl',
            'password' => Hash::make('TestTest5'),
            'role_ID' => 5,
        ]);
        DB::table('users')->insert([
            'name' => 'AppBeheer',
            'email' => 'Test6@test.nl',
            'password' => Hash::make('TestTest6'),
            'role_ID' => 6,
        ]);
    }
}
