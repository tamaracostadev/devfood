<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
	protected $product, $category;

	public function __construct(Product $product, Category $category)
	{
		$this->product = $product;
		$this->category = $category;
		$this->middleware(['can:categories', 'can:products']);
	}

	public function categories($idProduct)
	{
		if (!$product = $this->product->find($idProduct)) {
			return redirect()->back();
		}
		$categories = $product->categories()->paginate();
		return view('admin.pages.products.categories.categories', compact('product', 'categories'));
	}

	public function products($idCategory)
	{
		if (!$category = $this->category->find($idCategory)) {
			return redirect()->back();
		}
		$products = $category->products()->paginate();
		return view('admin.pages.categories.products.products', compact('category', 'products'));
	}

	public function categoriesAvailable(Request $request, $idProduct)
	{
		if (!$product = $this->product->find($idProduct)) {
			return redirect()->back();
		}
		$filters = $request->except('_token');
		$categories = $product->categoriesAvailable($request->filter);
		return view('admin.pages.products.categories.available', compact('product', 'categories', 'filters'));
	}

	public function attachCategoriesProduct(Request $request, $idProduct)
	{
		if (!$product = $this->product->find($idProduct)) {
			return redirect()->back();
		}
		if (!$request->categories || count($request->categories) == 0) {
			return redirect()
				->back()
				->with('info', 'Precisa escolher pelo menos uma categoria');
		}
		$product->categories()->attach($request->categories);
		return redirect()->route('products.categories', $product->id);
	}

	public function detachCategoriesProduct($idProduct, $idCategory)
	{
		$product = $this->product->find($idProduct);
		$category = $this->category->find($idCategory);
		if (!$product || !$category) {
			return redirect()->back();
		}
		$product->categories()->detach($category);
		return redirect()->route('products.categories', $product->id);
	}

	public function productsAvailable(Request $request, $idCategory)
	{
		if (!$category = $this->category->find($idCategory)) {
			return redirect()->back();
		}
		$filters = $request->except('_token');
		$products = $category->productsAvailable($request->filter);
		return view('admin.pages.categories.products.available', compact('category', 'products', 'filters'));
	}

	public function attachProductsCategory(Request $request, $idCategory)
	{
		if (!$category = $this->category->find($idCategory)) {
			return redirect()->back();
		}
		if (!$request->products || count($request->products) == 0) {
			return redirect()
				->back()
				->with('info', 'Precisa escolher pelo menos um produto');
		}
		$category->products()->attach($request->products);
		return redirect()->route('categories.products', $category->id);
	}

	public function detachProductsCategory($idCategory, $idProduct)
	{
		$category = $this->category->find($idCategory);
		$product = $this->product->find($idProduct);
		if (!$category || !$product) {
			return redirect()->back();
		}
		$category->products()->detach($product);
		return redirect()->route('categories.products', $category->id);
	}


}
