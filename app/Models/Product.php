<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $title
 * @property mixed|string $flag
 */
class Product extends Model
{
	use TenantTrait;


	protected $fillable = ['title', 'flag', 'description', 'image', 'price'];


	public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Category::class);
	}

	public function search($filter = null)
	{
		return $this->where(function ($query) use ($filter) {
			if ($filter) {
				$query->where('title', 'LIKE', "%{$filter}%")
					->orWhere('description', 'LIKE', "%{$filter}%");

			}
		})
			->latest()
			->paginate();

	}

	public function categoriesAvailable($filter = null)
	{
		return Category::whereNotIn('id', function ($query) {
			$query->select('category_product.category_id');
			$query->from('category_product');
			$query->whereRaw("category_product.product_id={$this->id}");
		})
			->where(function ($queryFilter) use ($filter) {
				if ($filter) {
					$queryFilter->where('categories.name', 'LIKE', "%{$filter}%");
				}
			})
			->paginate();
	}

}
