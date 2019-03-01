<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table='rooms';
    protected $fillable = [
        'name',
        'description',
        'content',
        'image',
        'amount',
        'area',
        'price',
        'discount',
        'slug',
        'status',
    ];
}
