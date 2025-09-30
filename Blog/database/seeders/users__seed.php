<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users__seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "name" => 'Cbas',
            "email" => 'cbas@gmail.com',
            "password" => Hash::make('cbas123'),
            "username" => 'cbas323',
            "img" => "default.jpg",
            'created_at' => date('Y-m-d H:i:s') // Fixed time format
        ]);
    }
}