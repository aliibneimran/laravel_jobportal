<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JobSeeker extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_seekers')->insert([
            'name' => 'Sakib',
            'email' => 'sakib@gmail.com',
            'password' => Hash::make('123456'),
            'status' => '1',
        ]);
    }
}
