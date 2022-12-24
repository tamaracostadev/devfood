<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
	private $repository;

	public function __construct(Product $product)
	{
		$this->repository = $product;
		$this->middleware(['can:products']);
	}

	public function index()
	{
		$products = $this->repository->latest()->paginate();
		return view('admin.pages.products.index', compact('products'));
	}

	public function create()
	{
		return view('admin.pages.products.create');
	}

	public function store(StoreUpdateProduct $request)
	{
		$data = $request->all();
		$tenant = auth()->user()->tenant->uuid;
		if ($request->hasFile('image') && $request->image->isValid()) {
			$nameFile = Str::kebab($request->title) . '.' . $request->image->extension();
			$data['image'] = $request->image->storeAs("tenants/{$tenant}/products", $nameFile);
		}
		$this->repository->create($data);
		return redirect()->route('products.index');
	}

	public function show($id)
	{
		if (!$product = $this->repository->find($id)) {
			return redirect()->back();
		}

		return view('admin.pages.products.show', compact('product'));
	}

	public function edit($id)
	{
		if (!$product = $this->repository->find($id)) {
			return redirect()->back();
		}

		return view('admin.pages.products.edit', compact('product'));
	}

	public function update(StoreUpdateProduct $request, $id)
	{
		$data = $request->all();
		if (!$product = $this->repository->find($id)) {
			return redirect()->back();
		}
		$tenant = auth()->user()->tenant->uuid;
		if ($request->hasFile('image') && $request->image->isValid()) {
			if ($product->image && Storage::exists($product->image)) {
				Storage::delete($product->image);
			}
			$nameFile = Str::kebab($request->title) . '.' . $request->image->extension();
			$data['image'] = $request->image->storeAs("tenants/{$tenant}/products", $nameFile);
		}
		$product->update($data);
		return redirect()->route('products.index');
	}

	public function destroy($id)
	{
		if (!$product = $this->repository->find($id)) {
			return redirect()->back();
		}
		if ($product->image && Storage::exists($product->image)) {
			Storage::delete($product->image);
		}
		$product->delete();
		return redirect()->route('products.index');
	}

	public function search(Request $request)
	{
		$filters = $request->except('_token');
		$products = $this->repository->search($request->filter);
		return view('admin.pages.products.index', compact('products', 'filters'));
	}

}
