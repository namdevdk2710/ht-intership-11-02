<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilitieDetail extends Model
{
    protected $table='facilitie_details';
    protected $fillable = [
        'facilitie_id',
        'name',
        'description',
        'content',
        'price',
        'image',
    ];

    public function facilitie()
    {
        return $this->belongsTo('App\Models\Facilitie', 'facilitie_id', 'id');
    }
}
