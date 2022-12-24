<?php

namespace App\Models\Traits;

trait UserACLTrait
{
	public function permissions()
	{
		$tenant = auth()->user()->tenant;
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
