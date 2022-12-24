<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTenant;
use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
	private $repository;

	public function __construct(Tenant $tenant)
	{
		$this->repository = $tenant;
		$this->middleware(['can:tenants']);
	}

	public function index()
	{
		$tenants = $this->repository->latest()->paginate();
		return view('admin.pages.tenants.index', compact('tenants'));
	}

	public function create()
	{
		$plans = Plan::all();
		return view('admin.pages.tenants.create', compact('plans'));
	}

	public function store(StoreUpdateTenant $request)
	{
		$data = $request->all();
		if ($request->hasFile('logo') && $request->logo->isValid()) {
			$data['logo'] = $request->logo;
		}
		$this->repository->create($data);
		return redirect()->route('tenants.index');
	}

	public function show($id)
	{
		if (!$tenant = $this->repository->with('plan')->find($id)) {
			return redirect()->back();
		}

		return view('admin.pages.tenants.show', compact('tenant'));
	}

	public function edit($id)
	{
		if (!$tenant = $this->repository->find($id)) {
			return redirect()->back();
		}
		$plans = Plan::all();
		return view('admin.pages.tenants.edit', compact('tenant', 'plans'));
	}

	public function update(StoreUpdateTenant $request, $id)
	{
		if (!$tenant = $this->repository->find($id)) {
			return redirect()->back();
		}

		$data = $request->all();
		if ($request->hasFile('logo') && $request->logo->isValid()) {
			if ($tenant->logo && Storage::exists($tenant->logo)) {
				Storage::delete($tenant->logo);
			}
			$data['logo'] = $request->logo;
		}
		$tenant->update($data);
		return redirect()->route('tenants.index');
	}

	public function destroy($id)
	{
		if (!$tenant = $this->repository->find($id)) {
			return redirect()->back();
		}

		if ($tenant->logo && Storage::exists($tenant->logo)) {
			Storage::delete($tenant->logo);
		}
		$tenant->delete();
		return redirect()->route('tenants.index');
	}

	public function search(Request $request)
	{
		$filters = $request->except('_token');
		$tenants = $this->repository->search($request->filter);
		return view('admin.pages.tenants.index', compact('tenants', 'filters'));
	}
}
