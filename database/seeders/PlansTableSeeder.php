<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    public function run()
    {
        Plan::create([
			'name' => 'Business',
			'url' => 'business',
			'price' => 100,
			'description' => 'Plano Empresarial',
		]);
    }
}
