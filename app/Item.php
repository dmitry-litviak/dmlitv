<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Traits\Upload\ImageUpload;

class Item extends Model {

    use ImageUpload;

	protected $fillable = [
        'title',
        'en_description',
        'ru_description',
        'image',
        'link'
    ];

    protected $table = 'items';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function technologies()
    {
        return $this->belongsToMany('App\Technology')->withTimestamps();
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }
    
    public function getTechnologyListAttribute()
    {
        return $this->technologies->lists('id');
    }

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        $this->image_field = 'image';
        $this->related_image_table = 'pictures';
    }

}
