<?php

namespace Api;

use App\Models\Product;
use App\Models\Tenant;
use Tests\TestCase;

class ProductsTest extends TestCase
{
	public function test_get_all_products_by_tenant()
	{
		$tenant = Tenant::factory()->create();
		$response = $this->getJson("/api/v1/products?token_company={$tenant->uuid}");
		$response->assertStatus(200);
	}

	public function test_get_product_by_identify()
	{
		$tenant = Tenant::factory()->create();
		$product = Product::factory()->create([
			'tenant_id' => $tenant->id,
		]);

		$response = $this->getJson("/api/v1/products/{$product->uuid}?token_company={$tenant->uuid}");
		$response->assertStatus(200);
	}

	public function test_get_product_by_identify_invalid_uuid()
	{
		$tenant = Tenant::factory()->create();
		$response = $this->getJson("/api/v1/products/00000000-0000-0000-0000-000000000000?token_company={$tenant->uuid}");
		$response->assertStatus(404);
	}

	public function test_get_product_by_identify_not_found()
	{
		$tenant = Tenant::factory()->create();
		$response = $this->getJson("/api/v1/products/00000000-0000-0000-0000-000000000000?token_company={$tenant->uuid}");
		$response->assertStatus(404);
	}
}
