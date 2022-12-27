<?php

namespace App\Repositories;

use App\Models\Evaluation;

class EvaluationRepository implements Contracts\EvaluationRepositoryInterface
{
	protected $entity;

	public function __construct(Evaluation $evaluation)
	{
		$this->entity = $evaluation;
	}

	public function newEvaluationOrder(int $orderId, int $clientId, array $data)
	{
		/* Creating a new evaluation. */
		return $this->entity->create([
			'comment' => $data['comment'] ?? '',
			'stars' => $data['stars'],
			'order_id' => $orderId,
			'client_id' => $clientId,
		]);
	}


	public function getEvaluationByOrder(int $orderId)
	{
		return $this->entity->where('order_id', $orderId)->get();
	}

	public function getEvaluationByClient(int $clientId)
	{
		return $this->entity->where('client_id', $clientId)->get();
	}

	public function getEvaluationById(int $id)
	{
		return $this->entity->find($id);
	}

	public function getEvaluationByClientIdByOrderId(int $clientId, int $orderId)
	{
		return $this->entity->where('client_id', $clientId)
			->where('order_id', $orderId)
			->first();
	}
}
