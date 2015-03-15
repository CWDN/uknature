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

        $species = new Species(['name' => 'test species 1', 'slug' => 'test-species-1']);

        $category = Category::bySlug('test-category-1');

        $category->species()->save($species);

    }

}