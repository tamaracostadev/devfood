<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;

class TableController extends Controller
{
	protected $tableService;

	public function __construct(TableService $tableService)
	{
		$this->tableService = $tableService;
	}

	public function tablesByTenant(TenantFormRequest $request)
	{
		if (!$tables = $this->tableService->getTablesByTenantUuid($request->token_company)) {
			return response()->json(['message' => 'Tables not found'], 404);
		}

		return TableResource::collection($tables);
	}

	public function show(TenantFormRequest $request, $uuid)
	{
		if (!$table = $this->tableService->getTableByUuid($uuid)) {
			return response()->json(['message' => 'Table not found'], 404);
		}

		return new TableResource($table);
	}
}
