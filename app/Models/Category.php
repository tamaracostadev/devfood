<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use TenantTrait;

	protected $fillable = ['name', 'url', 'description'];

	public function search($filter = null)
	{
		return $this->where('name', 'LIKE', "%{$filter}%")
			->orWhere('description', 'LIKE', "%{$filter}%")
			->paginate();
	}

	public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Product::class);
	}

	public function productsAvailable($filter = null)
	{
		return Product::whereNotIn('id', function ($query) {
			$query->select('category_product.product_id');
			$query->from('category_product');
			$query->whereRaw("category_product.category_id={$this->id}");
		})
			->where(function ($queryFilter) use ($filter) {
				if ($filter) {
					$queryFilter->where('products.title', 'LIKE', "%{$filter}%");
				}
			})
			->paginate();
	}


}
