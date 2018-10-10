<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryMidia extends Model
{
    protected $table = 'gallery_midias';
    protected $fillable = ['gallery_id', 'image', 'youtube', 'subtitle'];
}
