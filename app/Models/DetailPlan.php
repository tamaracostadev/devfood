<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
	protected $table = 'details_plan';
	protected $fillable = ['name'];

	public function plan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(Plan::class);
	}
}
