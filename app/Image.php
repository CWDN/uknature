<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    public $timestamps = true;

    protected $touches = ['species'];

    protected $fillable = ['src', 'caption', 'order'];

    public function species()
    {
        return $this->belongsTo('App\Species');
    }

}
