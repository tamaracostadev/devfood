<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
	protected $model = Order::class;

	public function definition(): array
	{
		return [
			'identify' => uniqid() . Str::random(10),
			'total' => 89.99,
			'status' => $this->faker->randomElement(['open', 'paid', 'canceled']),
			'comment' => $this->faker->sentence(),

			'tenant_id' => Tenant::factory(),
		];
	}
}
