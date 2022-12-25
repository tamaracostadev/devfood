<?php

namespace App\Tenant\Events;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;

class TenantCreated
{
	use Dispatchable;

	private $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function getUser(): User
	{
		return $this->user;
	}

	public function getTenant(): Tenant
	{
		return $this->user->tenant;
	}
}
