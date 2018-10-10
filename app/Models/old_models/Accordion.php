<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accordion extends Model
{
    protected $table = 'accordions';
    protected $fillable = ['name'];

    public function itens()
    {
    	return $this->hasMany(AccordionItem::class);
    }
}
