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
		$identify = $managerTenant->getTenantIdentify();

		if ($identify) {
			$model->tenant_id = $identify;
		}
	}
}
