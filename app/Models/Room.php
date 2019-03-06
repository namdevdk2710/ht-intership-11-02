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

    public function roomServiceDetails()
    {
        return $this->hasMany('App\Models\RoomServiceDetail', 'room_id', 'id');
    }
}
