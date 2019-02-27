<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table='gallerys';
    protected $fillable =[
        'name',
        'description',
        'content',
        'image',
    ];

    public $timestamps = true;

    public function galleryDetails()
    {
        return $this->hasMany('App\Models\GalleryDetail', 'gallery_id', 'id');
    }
}
