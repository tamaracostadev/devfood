<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
	protected $model = Category::class;

	public function definition(): array
	{
		return [
			'name' => $this->faker->unique()->name(),
			'description' => $this->faker->sentence(),
			'tenant_id' => Tenant::factory(),
		];
	}
}
