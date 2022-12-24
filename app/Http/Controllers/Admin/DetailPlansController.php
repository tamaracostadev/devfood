<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlansController extends Controller
{
	protected $repository, $plan;

	public function __construct(DetailPlan $detailPlan, Plan $plan)
	{
		$this->repository = $detailPlan;
		$this->plan = $plan;
		$this->middleware(['can:plans']);
	}

	public function index($urlPlan)
	{
		if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
			return redirect()->back();
		}
		$details = $plan->details()->paginate();
		return view('admin.pages.plans.details.index', compact('plan', 'details'));
	}

	public function create($urlPlan)
	{
		if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
			return redirect()->back();
		}
		return view('admin.pages.plans.details.create', compact('plan'));

	}

	public function store(StoreUpdateDetailPlan $request, $urlPlan)
	{
		if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
			return redirect()->back();
		}
		$plan->details()->create($request->all());
		return redirect()->route('details.plan.index', $plan->url);

	}

	public function show(Request $request)
	{
		$detail = $this->repository->find($request->id);
		return view('admin.pages.plans.details.show', compact('detail'));
	}

	public function edit($urlPlan, $idDetail)
	{
		$plan = $this->plan->where('url', $urlPlan)->first();
		$detail = $this->repository->find($idDetail);
		if (!$plan || !$detail) {
			return redirect()->back();
		}
		return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
	}

	public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail)
	{
		$plan = $this->plan->where('url', $urlPlan)->first();
		$detail = $this->repository->find($idDetail);
		if (!$plan || !$detail) {
			return redirect()->back();
		}
		$detail->update($request->all());
		return redirect()->route('details.plan.index', $plan->url);
	}

	public function destroy($urlPlan, $idDetail)
	{
		$plan = $this->plan
			->where('url', $urlPlan)->first();
		$detail = $this->repository->find($idDetail);
		if (!$plan || !$detail) {
			return redirect()->back();
		}
		$detail->delete();
		return redirect()->route('details.plan.index', $urlPlan);
	}
}
