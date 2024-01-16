<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Job extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobs')->insert([
            'title' => 'Laravel Devloper',
            'description' => 'There is devloper world',
            'salary' => '50000',
            'image' => 'image/no_photo.jpg',
            'tag' => 'No tag',
            'availability' => '1',
            'category_id' => '1',
        ]);
        DB::table('jobs')->insert([
            'title' => 'React Devloper',
            'description' => 'There is devloper world',
            'salary' => '45000',
            'image' => 'image/no_photo.jpg',
            'tag' => 'No tag',
            'availability' => '1',
            'category_id' => '2',
        ]);
        DB::table('jobs')->insert([
            'title' => 'Vue Devloper',
            'description' => 'There is devloper world',
            'salary' => '48000',
            'image' => 'image/no_photo.jpg',
            'tag' => 'No tag',
            'availability' => '1',
            'category_id' => '3',
        ]);
    }
}	
