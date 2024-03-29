<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluation extends Model
{
	use HasFactory;

	protected $table = 'order_evaluations';
	protected $fillable = ['order_id', 'client_id', 'stars', 'comment'];

	public function order(): BelongsTo
	{
		return $this->belongsTo(Order::class);
	}

	public function client(): BelongsTo
	{
		return $this->belongsTo(Client::class);
	}
}
