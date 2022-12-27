<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
	public function creating(Product $product)
	{
		/* Creating a slug for the product title. */
		$product->flag = Str::kebab($product->title);
		$product->uuid = Str::uuid();
	}

	/**
	 * @param Product $product
	 * @return void
	 */
	public function updating(Product $product)
	{
		/* Creating a slug for the product title. */
		$product->flag = Str::kebab($product->title);
	}
}
