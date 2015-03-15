<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    public function species()
    {
        return $this->hasMany('App\Species');
    }

    public static function bySlug($slug)
    {
        return self::where('slug', $slug)->firstOrFail();
    }
}
