<?php

namespace App\Observers;

use App\Models\Tenant;
use Illuminate\Support\Str;

class TenantObserver
{
	public function creating(Tenant $tenant)
	{
		$tenant->url = Str::kebab($tenant->name);
		$tenant->uuid = Str::uuid();
		if ($tenant->logo) {
			$nameFile = $tenant->url . '.' . $tenant->logo->extension();
			$tenant->logo = $tenant->logo->storeAs("tenants/{$tenant->uuid}/logo", $nameFile);
		}
	}

	public function updating(Tenant $tenant)
	{
		$tenant->url = Str::kebab($tenant->name);
		if ($tenant->logo) {
			$nameFile = $tenant->url . '.' . $tenant->logo->extension();
			$tenant->logo = $tenant->logo->storeAs("tenants/{$tenant->uuid}/logo", $nameFile);
		}
	}
}
