<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuisineDetail extends Model
{
    protected $table='cuisine_details';
    protected $fillable = [
        'cuisine_id',
        'name',
        'description',
        'content',
        'price',
        'image',
    ];

    public function cuisine()
    {
        return $this->belongsTo('App\Models\Cuisine', 'cuisine_id', 'id');
    }
}
