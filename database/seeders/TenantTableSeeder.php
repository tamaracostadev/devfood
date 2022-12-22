<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantTableSeeder extends Seeder
{
    public function run()
    {
		$plan = Plan::first();

		$plan->tenants()->create([
			'cnpj' => '12345678901234',
			'name' => 'Empresa 1',
			'url' => 'empresa1',
			'email' => 'super@admin.com.br'
		]);
    }
}
