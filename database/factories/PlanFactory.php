<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
	protected $model = Plan::class;

	public function definition(): array
	{
		return [
			'name' => $this->faker->name(),
			'price' => 199.00,
			'description' => $this->faker->sentence()
		];
	}


}
