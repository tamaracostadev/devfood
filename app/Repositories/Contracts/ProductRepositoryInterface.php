<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
	public function getProductsByTenantId(int $id, array $categories): Collection;

	public function getProductByUuid(string $uuid);


}
