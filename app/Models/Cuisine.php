<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $table='cuisines';
    protected $fillable =[
        'name',
        'description',
    ];
    public $timestamps = true;

    public function cuisineDetails()
    {
        return $this->hasMany('App\Models\CuisineDetail', 'cuisine_id', 'id');
    }
}
