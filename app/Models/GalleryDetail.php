<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryDetail extends Model
{
    protected $table='gallery_details';
    protected $fillable = [
        'gallery_id',
        'name',
        'description',
        'content',
        'image',
    ];
    public function gallery(){
        return $this->belongsTo('App\Models\Gallery','gallery_id','id');
    }
}
