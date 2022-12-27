<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreEvaluationOrder;
use App\Http\Resources\EvaluationResource;
use App\Models\Evaluation;
use App\Services\EvaluationService;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
	protected $evaluationService;

	public function __construct(EvaluationService $evaluationService)
	{
		$this->evaluationService = $evaluationService;
	}


	public function store(StoreEvaluationOrder $request, $identifyOrder)
	{
		$evaluation = $this->evaluationService->CreateNewEvaluation($identifyOrder, $request->all());
		return new EvaluationResource($evaluation);
	}

	public function show(Evaluation $evaluation)
	{
	}

	public function edit(Evaluation $evaluation)
	{
	}

	public function update(Request $request, Evaluation $evaluation)
	{
	}

	public function destroy(Evaluation $evaluation)
	{
	}
}
