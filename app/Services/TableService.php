<?php

namespace App\Services;

use App\Repositories\Contracts\TenantRepositoryInterface;
use App\Repositories\TableRepository;
use Illuminate\Support\Collection;

class TableService
{
	protected $tableRepository, $tenantRepository;

	public function __construct(TableRepository $tableRepository, TenantRepositoryInterface $tenantRepository)
	{
		$this->tableRepository = $tableRepository;
		$this->tenantRepository = $tenantRepository;
	}

	public function getTablesByTenantUuid(string $uuid): Collection
	{
		$tenant = $this->tenantRepository->getTenantByUuid($uuid);

		return $this->tableRepository->getTablesByTenantId($tenant->id);
	}

	public function getTableByUuid(string $uuid)
	{
		return $this->tableRepository->getTableByUuid($uuid);
	}

}
