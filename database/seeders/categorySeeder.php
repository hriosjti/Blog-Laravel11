<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'red'
        ]);

        Category::create([
            'name' => 'News',
            'slug' => 'news',
            'color' => 'yellow'
        ]);

        Category::create([
            'name' => 'Footbal News',
            'slug' => 'footbal-news',
            'color' => 'blue'
        ]);

        Category::create([
            'name' => 'Music',
            'slug' => 'music',
            'color' => 'gray'
        ]);

        Category::create([
            'name' => 'Games',
            'slug' => 'games',
            'color' => 'purple'
        ]);

        Category::create([
            'name' => 'Film',
            'slug' => 'film',
            'color' => 'pink'
        ]);
    }
}
