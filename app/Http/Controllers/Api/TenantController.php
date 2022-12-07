<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Http\Request;

class TenantController extends Controller
{
	protected $tenantService;

	public function __construct(TenantRepositoryInterface $repository)
	{
		$this->tenantService = $repository;
	}

	public function index(Request $request)
	{
		$per_page = (int)$request->get('per_page', 10);
		return TenantResource::collection($this->tenantService->getAllTenants($per_page));
	}

	public function show($uuid)
	{
		if (!$tenant = $this->tenantService->getTenantByUuid($uuid)) {
			return response()->json(['message' => 'Empresa não encontrada'], 404);
		}

		return TenantResource::make($tenant);
	}
}
