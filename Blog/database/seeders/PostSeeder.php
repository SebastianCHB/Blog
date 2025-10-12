<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('posts')->insert([
            "title" => 'Tulipanes',
            "description" => 'Cuide sus tulipanes',
            "img" => 'default.jpg',
            "content" => 'Contenido del post',
            "likes" => 0,
            "slug" => 'como-cuidar-tulipanes',
            "user_id" => 1,
            "category_id" => 1,
            'created_at' => date('Y-m-d H:i:s') 
        ]);
    }
}
