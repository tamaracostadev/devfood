<?php

namespace Database\Factories;

use App\Models\Table;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
{
	protected $model = Table::class;

	public function definition(): array
	{
		return [
			'identify' => $this->faker->word(),
			'description' => $this->faker->sentence(),
			'tenant_id' => Tenant::factory()
		];
	}
}
