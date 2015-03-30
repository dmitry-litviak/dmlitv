<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Item extends Model {

	protected $fillable = [
        'title',
        'description',
        'image',
        'link'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function technologies()
    {
        return $this->belongsToMany('App\Technology')->withTimestamps();
    }
    
    public function getTechnologyListAttribute()
    {
        return $this->technologies->lists('id');
    }

}
