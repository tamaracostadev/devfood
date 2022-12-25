<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TableRepository implements Contracts\TableRepositoryInterface
{
	protected $table;

	public function __construct()
	{
		$this->table = 'tables';
	}

	public function getTablesByTenantUuid(string $uuid): Collection
	{
		return DB::table($this->table)
			->join('tenants', 'tenants.id', '=', 'tables.tenant_id')
			->where('tenants.uuid', $uuid)
			->select('tables.*')
			->get();
	}

	public function getTablesByTenantId(int $idTenant): Collection
	{
		return DB::table($this->table)->where('tenant_id', $idTenant)->get();
	}

	public function getTableById(int $id)
	{
		return DB::table($this->table)->where('id', $id)->first();
	}
}
