<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryService
{
	protected $tenantRepository, $categoryRepository;

	public function __construct(CategoryRepository $categoryRepository, TenantRepositoryInterface $tenantRepository)
	{
		$this->categoryRepository = $categoryRepository;
		$this->tenantRepository = $tenantRepository;
	}

	public function getCategoriesByTenantUuid(string $uuid): Collection
	{
		$tenant = $this->tenantRepository->getTenantByUuid($uuid);

		return $this->categoryRepository->getCategoriesByTenantId($tenant->id);
	}

	public function getCategoryByUrl(string $url)
	{
		return $this->categoryRepository->getCategoryByUrl($url);
	}

}
