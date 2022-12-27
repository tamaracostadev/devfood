<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository implements Contracts\OrderRepositoryInterface
{
	protected $entity;

	public function __construct(Order $order)
	{
		$this->entity = $order;
	}

	public function createNewOrder(
		string $identify,
		float  $total,
		string $status,
		string $comment,
		int    $tenant_id,
			   $client_id = null,
			   $table_id = null
	)
	{
		return $this->entity->create([
			'identify' => $identify,
			'total' => $total,
			'status' => $status,
			'comment' => $comment,
			'tenant_id' => $tenant_id,
			'client_id' => $client_id,
			'table_id' => $table_id,
		]);

	}

	public function getOrderByIdentify($identify): ?Order
	{
		return $this->entity->where('identify', $identify)->first();
	}

	public function registerProductsOrder($orderId, array $products)
	{
		$order = $this->entity->find($orderId);
		$order->products()->attach($products);
	}

	public function getOrdersByClient(?string $clientId)
	{
		return $this->entity->where('client_id', $clientId)->paginate();
	}

}
