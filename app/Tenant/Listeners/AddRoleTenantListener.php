<?php

namespace App\Tenant\Listeners;

use App\Models\Role;
use App\Tenant\Events\TenantCreated;

class AddRoleTenantListener
{
	public function __construct()
	{
	}

	public function handle(TenantCreated $event)
	{
		if (!$role = Role::where('name', 'Admin')->first()) {
			$role = Role::create([
				'name' => 'Admin',
				'description' => 'Administrador do Sistema',
			]);
		}
		$event->getUser()->roles()->attach($role);
		return 1;
	}
}
