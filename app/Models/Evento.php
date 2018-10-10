<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = ['foto', 'nome_evento', 'local_evento'];

    public function images()
    {
    	return $this->hasMany(GaleriaEvento::class);
    }
}
