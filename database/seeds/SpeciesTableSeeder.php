<?php

use App\Category;
use App\Species;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpeciesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('species')->delete();

        $data = [
            ['test species 1', 'testus speciesus 1', 'description 1', 'test-species-1', 'test-category-1'],
            ['test species 2', 'testus speciesus 2', 'description 2', 'test-species-2', 'test-category-1'],
            ['test species 3', 'testus speciesus 3', 'description 3', 'test-species-3', 'test-category-1'],
            ['test species 4', 'testus speciesus 4', 'description 4', 'test-species-4', 'test-category-1'],
            ['test species 5', 'testus speciesus 5', 'description 5', 'test-species-5', 'test-category-2'],
            ['test species 6', 'testus speciesus 6', 'description 6', 'test-species-6', 'test-category-2'],
            ['test species 7', 'testus speciesus 7', 'description 7', 'test-species-7', 'test-category-3'],
        ];

        foreach($data as $item) {
            $species = new Species([
                'name' => $item[0],
                'binomial' => $item[1],
                'description' => $item[2],
                'slug' => $item[3],
            ]);
            $category = Category::bySlug($item[4]);
            $category->species()->save($species);
        }
    }
}