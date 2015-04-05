<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    protected $fillable = [
        'name'
    ];

    public function items() {
        $this->belongsTo('App\Item');
    }

}
