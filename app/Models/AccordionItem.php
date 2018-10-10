<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccordionItem extends Model
{
	protected $table = 'accordion_items';
	protected $fillable = ['accordion_id', 'title', 'description'];

	public function accordion()
	{
		return $this->belongsTo(Accordion::class);
	}
}
