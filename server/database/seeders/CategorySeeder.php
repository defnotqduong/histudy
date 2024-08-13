<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Music'
        ]);

        Category::create([
            'name' => 'Photography'
        ]);

        Category::create([
            'name' => 'Fitness'
        ]);

        Category::create([
            'name' => 'Engineering'
        ]);

        Category::create([
            'name' => 'Artificial Intelligence'
        ]);

        Category::create([
            'name' => 'Blockchain'
        ]);

        Category::create([
            'name' => 'Game Development'
        ]);

        Category::create([
            'name' => 'Augmented Reality'
        ]);

        Category::create([
            'name' => 'Virtual Reality'
        ]);

        Category::create([
            'name' => 'Digital Marketing'
        ]);

        Category::create([
            'name' => 'Project Management'
        ]);
    }
}
