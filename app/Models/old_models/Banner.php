<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $fillable = ['position_id', 'name', 'image', 'description', 'link', 'label_link', 'target'];

    public function position()
    {
    	return $this->belongsTo(Position::class);
    }
}
