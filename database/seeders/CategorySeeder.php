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
        $categories = [
            ['name' => 'Category 1'],
            ['name' => 'Category 2'],
        ];

        foreach ($categories as $categoryData) {
            $existingCategory = Category::where('name', $categoryData['name'])->first();

            if (!$existingCategory) {
                Category::create($categoryData);
            }
        }
    }
}
