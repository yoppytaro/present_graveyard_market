<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'user_id', 'name', 'price', 'description', 'image', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
