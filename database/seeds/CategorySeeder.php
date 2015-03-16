<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();

        Category::insert([
            ['name' => 'Test Category 1', 'slug' => 'test-category-1'],
            ['name' => 'Test Category 2', 'slug' => 'test-category-2'],
            ['name' => 'Test Category 3', 'slug' => 'test-category-3']
        ]);
    }

}