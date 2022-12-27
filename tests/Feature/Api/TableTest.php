<?php

namespace Tests\Feature\Api;

use App\Models\Tenant;
use Tests\TestCase;

class TableTest extends TestCase
{
	public function test_get_all_tables_by_tenant()
	{
		$tenant = Tenant::factory()->create();
		$response = $this->getJson("/api/v1/tables?token_company={$tenant->uuid}");
		$response->assertStatus(200);
	}

	public function test_get_table_by_identify()
	{
		$tenant = Tenant::factory()->create();
		$table = $tenant->tables()->create([
			'identify' => 'T1',
			'description' => 'Mesa 1',
		]);
		$response = $this->getJson("/api/v1/tables/{$table->uuid}?token_company={$tenant->uuid}");
		$response->assertStatus(200);
	}

	public function test_get_table_by_identify_invalid_uuid()
	{
		$tenant = Tenant::factory()->create();
		$response = $this->getJson("/api/v1/tables/00000000-0000-0000-0000-000000000000?token_company={$tenant->uuid}");
		$response->assertStatus(404);
	}

	public function test_get_table_by_identify_not_found()
	{
		$tenant = Tenant::factory()->create();
		$response = $this->getJson("/api/v1/tables/00000000-0000-0000-0000-000000000000?token_company={$tenant->uuid}");
		$response->assertStatus(404);
	}
}
