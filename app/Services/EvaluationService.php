<?php

namespace App\Services;

use App\Repositories\Contracts\EvaluationRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;

class EvaluationService
{
	protected $evaluationRepository, $orderRepository;

	public function __construct(EvaluationRepositoryInterface $evaluationRepository,
								OrderRepositoryInterface      $orderRepository)
	{
		$this->evaluationRepository = $evaluationRepository;
		$this->orderRepository = $orderRepository;
	}


	public function CreateNewEvaluation(string $identifyOrder, array $data)
	{
		$order = $this->orderRepository->getOrderByIdentify($identifyOrder);
		$clientId = $this->getClientId();
		return $this->evaluationRepository->newEvaluationOrder($order->id, $clientId, $data);
	}

	public function getEvaluationByOrder($orderId)
	{
		return $this->evaluationRepository->getEvaluationByOrder($orderId);
	}

	public function getEvaluationByClient($clientId)
	{
		return $this->evaluationRepository->getEvaluationByClient($clientId);
	}

	private function getClientId()
	{
		return auth()->check() ? auth()->user()->id : null;
	}
}
