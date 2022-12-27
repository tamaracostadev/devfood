<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
	use TenantTrait, HasFactory;

	protected $fillable = [
		'tenant_id',
		'identify',
		'client_id',
		'table_id',
		'total',
		'status',
		'comment',
	];

	public function products()
	{
		return $this->belongsToMany(Product::class);
	}

	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function table()
	{
		return $this->belongsTo(Table::class);
	}

	public function tenant()
	{
		return $this->belongsTo(Tenant::class);
	}

	public function evaluations(): HasMany
	{
		return $this->hasMany(Evaluation::class);
	}

}
