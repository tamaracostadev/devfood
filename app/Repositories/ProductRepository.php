<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
	protected $table;

	public function __construct()
	{
		$this->table = 'products';
	}

	public function getProductsByTenantId(int $id, array $categories): Collection
	{
		return DB::table($this->table)
			->join('category_product', 'category_product.product_id', '=', 'products.id')
			->join('categories', 'category_product.category_id', '=', 'categories.id')
			->where('products.tenant_id', $id)
			->where('categories.tenant_id', $id)
			->where(function ($query) use ($categories) {
				if ($categories != [])
					$query->whereIn('categories.url', $categories);
			})
			->select('products.*')
			->distinct()
			->get();
	}

	public function getProductByFlag(string $flag)
	{
		return DB::table($this->table)
			->where('flag', $flag)
			->first();
	}
}
