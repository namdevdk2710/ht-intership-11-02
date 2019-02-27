<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table='modules';
    protected $fillable =[
        'name',
        'image',
        'description',
        'slug',
    ];

    public $timestamps = true;
}
