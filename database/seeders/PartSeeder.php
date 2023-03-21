<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('parts')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'PricePerKg' => 4,
            'StashKg' => 4,
        ]);
    }
}
