<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facilitie extends Model
{
    protected $table='facilities';
    protected $fillable =[
        'name',
        'description',
    ];
    public $timestamps = true;

    public function facilitieDetails()
    {
        return $this->hasMany('App\Models\FacilitieDetail', 'facilitie_id', 'id');
    }
}
