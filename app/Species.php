<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model {

	protected $fillable = ['name', 'slug'];

    public static function bySlug($slug)
    {
        return self::where('slug', $slug)->firstOrFail();
    }
}
