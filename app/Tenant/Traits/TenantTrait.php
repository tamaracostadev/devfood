<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

trait TenantTrait
{
	/**
	 * @return array
	 */
	protected static function booted()
	{
		/* Adding the TenantObserver to the model. */
		static::observe(TenantObserver::class);
		static::addGlobalScope(new TenantScope);
	}

}
