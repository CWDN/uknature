<?php

use App\Category;
use App\Image;
use App\Species;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    public function run()
    {
        DB::table('images')->delete();

        $data = [
            //['images/test.jpg', 'caption 1', 1, 'test-species-1'],
            //['images/test.jpg', 'caption 2', 2, 'test-species-2'],
            //['images/test.jpg', 'caption 3', 3, 'test-species-3'],
            //['images/test.jpg', 'caption 3', 3, 'test-species-4'],
            //['images/test.jpg', 'caption 3', 3, 'test-species-5'],
        ];

        foreach($data as $item) {
            $image = new Image([
                'src' => $item[0],
                'caption' => $item[1],
                'order' => $item[2]
            ]);
            $species = Species::bySlug($item[3]);
            $species->images()->save($image);
        }
    }
}