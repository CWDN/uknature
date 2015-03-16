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
            ['images/test-image-1.jpg', 'caption 1', 1, 'test-species-1'],
            ['images/test-image-2.jpg', 'caption 2', 2, 'test-species-1'],
            ['images/test-image-3.jpg', 'caption 3', 3, 'test-species-1'],
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