<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model {

    public $timestamps = true;

	protected $fillable = ['name', 'binomial', 'description', 'slug'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image')->orderBy('order');
    }

    public static function bySlug($slug)
    {
        return self::where('slug', $slug)->firstOrFail();
    }
}
