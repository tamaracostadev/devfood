<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTable;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
	private $repository;

	public function __construct(Table $table)
	{
		$this->repository = $table;
		$this->middleware(['can:tables']);
	}

	public function index()
	{
		$tables = $this->repository->latest()->paginate();

		return view('admin.pages.tables.index', compact('tables'));
	}

	public function create()
	{
		return view('admin.pages.tables.create');
	}

	public function store(StoreUpdateTable $request)
	{
		$this->repository->create($request->all());

		return redirect()->route('tables.index');
	}

	public function show($id)
	{
		if (!$table = $this->repository->find($id)) {
			return redirect()->back();
		}

		return view('admin.pages.tables.show', compact('table'));
	}

	public function qrCode($identify)
	{
		if (!$table = $this->repository->where('identify', $identify)->first()) {
			return redirect()->back();
		}
		$tenant = auth()->user()->tenant;
		$uri = env('URI_CLIENT') . "/{$tenant->uuid}/{$table->uuid}";

		return view('admin.pages.tables.qrcode', compact('table', 'uri'));
	}


	public function edit(Table $table)
	{
		if (!$table) {
			return redirect()->back();
		}

		return view('admin.pages.tables.edit', compact('table'));
	}

	public function update(StoreUpdateTable $request, $id)
	{
		if (!$table = $this->repository->find($id)) {
			return redirect()->back();
		}

		$table->update($request->all());

		return redirect()->route('tables.index');
	}

	public function search(Request $request)
	{
		$filters = $request->except('_token');

		$tables = $this->repository->search($request->filter);

		return view('admin.pages.tables.index', compact('tables', 'filters'));
	}

	public function destroy(Table $table)
	{
	}
}
