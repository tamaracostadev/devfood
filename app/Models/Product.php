<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use TenantTrait;

	protected $fillable = ['name', 'description', 'image', 'price'];

	public function search($filter = null)
	{
		return $this->where('name', 'LIKE', "%{$filter}%")
			->orWhere('description', 'LIKE', "%{$filter}%")
			->paginate();
	}

	public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Category::class);
	}

}
