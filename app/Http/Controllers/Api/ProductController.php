<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
	protected $productService;

	public function __construct(ProductService $productService)
	{
		$this->productService = $productService;
	}

	public function productsByTenant(TenantFormRequest $request)
	{
		if (!$products = $this->productService->getProductsByTenantUuid($request->token_company, $request->get('categories', []))) {
			return response()->json(['message' => 'Products not found'], 404);
		}

		return ProductResource::collection($products);
	}

	public function show(TenantFormRequest $request, $flag)
	{
		if (!$product = $this->productService->getProductByFlag($flag)) {
			return response()->json(['message' => 'Product not found'], 404);
		}

		return ProductResource::make($product);
	}
}
