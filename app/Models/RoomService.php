<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomService extends Model
{
    protected $table='room_services';

    protected $fillable = [
        'name',
        'description',
        'icon',
    ];

    public function roomServiceDetails()
    {
        return $this->hasMany('App\Models\RoomServiceDetail', 'room_service_id', 'id');
    }
}
