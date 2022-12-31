<?php

namespace App\Events;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreatedEvent implements ShouldBroadcast
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	public $order;

	public function __construct(Order $order)
	{
		$this->order = $order;
	}


	public function broadcastOn(): Channel
	{
		return new PrivateChannel('order-created.' . $this->order->tenant_id);
	}

	public function broadcastWith(): array
	{
		return [
			'order' => (new OrderResource($this->order))->resolve()
		];
	}
}
