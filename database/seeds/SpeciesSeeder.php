<?php

use App\Category;
use App\Species;
use Goodby\CSV\Import\Standard\LexerConfig;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;

class SpeciesSeeder extends Seeder
{
    public function run()
    {
        DB::table('species')->delete();
        DB::table('categories')->delete();

        $config = new LexerConfig();
        $config->setIgnoreHeaderLine(true);

        $lexer = new Lexer($config);
        $interpreter = new Interpreter();

        $interpreter->addObserver(function(array $row) {

            $row = array_combine(['category', 'name', 'binomial', 'description'], $row);

            $row['slug'] = $this->slug($row['binomial'] . ' ' . $row['name']);

            $species = new Species($row);

            $category = Category::firstOrCreate([
                'name' => $row['category'],
                'slug' => $this->slug($row['category'])
            ]);

            $category->species()->save($species);

        });

        $lexer->parse('database/data/species.csv', $interpreter);
    }

    public function slug($str)
    {
        $slug = trim(strtolower($str));

        return preg_replace("![^a-z0-9]+!i", "-", $slug);
    }
}