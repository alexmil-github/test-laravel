<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'name' => Str::random(10),
            'title' => Str::random(10),
            'description' => Str::random(10),
            'category_id' => rand(1,2),
            'author_id' => rand(1,4),
            'views' => rand(1,20)
        ]);
    }
}
