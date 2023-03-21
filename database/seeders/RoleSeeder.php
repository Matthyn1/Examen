<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\numb;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * seed for testing different roles for users
     */
    public function run(): void
    {
        //
        DB::table('role')->insert([
            'name' => 'Admin',
            'description' => Str::random(10),
            'value' => 1
        ]);
        DB::table('role')->insert([
            'name' => 'Algemeen',
            'description' => Str::random(10),
            'value' => 2
        ]);
        DB::table('role')->insert([
            'name' => 'Uitgifte',
            'description' => Str::random(10),
            'value' => 3
        ]);
        DB::table('role')->insert([
            'name' => 'Verwerking',
            'description' => Str::random(10),
            'value' => 4
        ]);
        DB::table('role')->insert([
            'name' => 'Inname',
            'description' => Str::random(10),
            'value' => 5
        ]);
        DB::table('role')->insert([
            'name' => 'AppBeheerder',
            'description' => Str::random(10),
            'value' => 6
        ]);
    }
}
