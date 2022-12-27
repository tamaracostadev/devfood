<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
	protected $model = Product::class;

	public function definition(): array
	{
		return [
			'tenant_id' => Tenant::factory(),
			'title' => $this->faker->word(),
			'image' => 'https://via.placeholder.com/600x300.png?text=Product',
			'description' => $this->faker->sentence(),
			'price' => 12.00,
		];
	}
}
