<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrder;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;

class OrderController extends Controller
{
	protected $orderService;

	public function __construct(OrderService $orderService)
	{
		$this->orderService = $orderService;
	}

	public function store(StoreOrder $request)
	{
		$order = $this->orderService->createNewOrder($request->all());

		broadcast(new OrderCreatedEvent($order));
		return new OrderResource($order);
	}

	public function show($identify)
	{
		if (!$order = $this->orderService->getOrderByIdentify($identify)) {
			return response()->json(['message' => 'Order not found'], 404);
		}

		return new OrderResource($order);
	}

	public function myOrders()
	{
		$orders = $this->orderService->getOrdersByClient();

		return OrderResource::collection($orders);
	}

}
