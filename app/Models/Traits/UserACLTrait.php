<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
	public function permissions(): array
	{
		$permissionsPlan = $this->permissionsPlan();
		$permissionsRole = $this->permissionsRole();
		$permissions = [];
		foreach ($permissionsRole as $permission) {
			if (in_array($permission, $permissionsPlan)) {
				$permissions[] = $permission;
			}
		}
		return $permissions;
	}


	public function permissionsRole(): array
	{
		$permissions = [];
		$roles = $this->roles()->with('permissions')->get();
		foreach ($roles as $role) {
			foreach ($role->permissions as $permission) {
				$permissions[] = $permission->name;
			}
		}
		return $permissions;
	}


	public function permissionsPlan(): array
	{
		$tenant = Tenant::with('plan.profiles.permissions')->find($this->tenant_id);
		$plan = $tenant->plan;
		$profiles = $plan->profiles;
		$permissions = [];
		$profiles->map(function ($profile) use (&$permissions) {
			return $profile->permissions->map(function ($permission) use (&$permissions) {
				$permissions[] = $permission->name;
			});
		})->flatten()->toArray();
		return $permissions;
	}

	public function hasPermission(string $permissionName): bool
	{
		return in_array($permissionName, $this->permissions());
	}

	public function isAdmin(): bool
	{
		return in_array($this->email, config('acl.admins'));
	}

	public function isTenant(): bool
	{
		return !in_array($this->email, config('acl.admins'));
	}
}
