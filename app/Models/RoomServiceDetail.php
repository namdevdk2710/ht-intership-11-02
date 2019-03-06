<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomServiceDetail extends Model
{
    protected $table='room_service_details';

    protected $fillable = [
        'room_id',
        'room_service_id',
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id', 'id');
    }

    public function roomService()
    {
        return $this->belongsTo('App\Models\RoomService', 'room_service_id', 'id');
    }
}
