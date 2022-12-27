<?php

namespace Tests\Feature\Api;

use App\Models\Tenant;
use Tests\TestCase;

class CategoryTest extends TestCase
{

	public function test_error_get_categories_by_tenant()
	{
		$response = $this->getJson('/api/v1/categories');
		$response->assertStatus(422);
	}

	public function test_get_all_categories_by_tenant()
	{
		$tenant = Tenant::factory()->create();
		$response = $this->getJson('/api/v1/categories?token_company=' . $tenant->uuid);
		$response->assertStatus(200);
	}

	public function test_get_categories_by_tenant_invalid_uuid()
	{
		$response = $this->getJson('/api/v1/categories?token_company=00000000-0000-0000-0000-000000000000');
		$response->assertStatus(422);
	}

	public function test_get_category_by_identify()
	{
		$tenant = Tenant::factory()->create();
		$category = $tenant->categories()->create([
			'name' => 'Category Test',
			'description' => 'Description Test',
		]);
		$response = $this->getJson("/api/v1/categories/{$category->uuid}?token_company={$tenant->uuid}");
		$response->assertStatus(200);
	}

	public function test_get_category_by_identify_invalid_uuid()
	{
		$tenant = Tenant::factory()->create();
		$response = $this->getJson("/api/v1/categories/00000000-0000-0000-0000-000000000000?token_company={$tenant->uuid}");
		$response->assertStatus(404);
	}

	
}
