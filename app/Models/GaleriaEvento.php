<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriaEvento extends Model
{
    protected $table = 'galeria_evento';
    protected $fillable = ['evento_id'];

    public function eventos()
    {
    	return $this->belongsTo(Evento::class);
    }
}
