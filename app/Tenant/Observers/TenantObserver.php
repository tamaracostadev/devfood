<?php

namespace App\Tenant\Observers;


use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
	/**
	 * @param Model $model
	 * @return void
	 */
	public function creating(Model $model)
	{
		$managerTenant = app(\App\Tenant\ManagerTenant::class);
		$tenantId = $managerTenant->getTenantIdentify();
		$model->tenant_id = $tenantId;
	}
}
