<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller
{
	protected $categoryService;

	public function __construct(CategoryService $categoryService)
	{
		$this->categoryService = $categoryService;
	}


	public function categoriesByTenant(TenantFormRequest $request)
	{
		if (!$categories = $this->categoryService->getCategoriesByTenantUuid($request->token_company)) {
			return response()->json(['message' => 'Categories not found'], 404);
		}

		return CategoryResource::collection($categories);
	}

	public function show(TenantFormRequest $request, $url)
	{
		if (!$category = $this->categoryService->getCategoryByUrl($url)) {
			return response()->json(['message' => 'Category not found'], 404);
		}

		return CategoryResource::make($category);
	}
}


