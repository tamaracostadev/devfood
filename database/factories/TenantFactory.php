<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
	protected $model = Tenant::class;

	public function definition(): array
	{
		return [
			'name' => $this->faker->name(),
			'email' => $this->faker->unique()->safeEmail(),
			'cnpj' => uniqid() . date('YmdHis'),

			'plan_id' => Plan::factory(),
		];
	}
}
