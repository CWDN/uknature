<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model {

	protected $fillable = ['name', 'binomial', 'description', 'slug'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public static function bySlug($slug)
    {
        return self::where('slug', $slug)->firstOrFail();
    }
}
