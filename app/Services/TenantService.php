<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TenantService
{
	private $plan, $data = [];
	public function __construct(Plan $plan, array $data)
	{
		$this->plan = $plan;
		$this->data = $data;
	}

	public function make()
	{
		$tenant = $this->storeTenant();
		return $this->storeUser($tenant);
	}

	public function storeTenant()
	{
		$data = $this->data;
		return $this->plan->tenants()->create([
			'name' => $data['empresa'],
			'cnpj' => $data['cnpj'],
			'email' => $data['email'],
			'subscription' => now(),
			'expires_at' => now()->addDays(7),
		]);
	}

	public function storeUser($tenant){
		$data = $this->data;
		return $tenant->users()->create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
		]);
	}
}
