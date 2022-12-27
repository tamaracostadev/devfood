<?php

namespace App\Http\Resources;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/* A PHPDoc annotation that tells the IDE that the class is mixed with the Order class. */

/** @mixin Order */
class OrderResource extends JsonResource
{
	/**
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'identify' => $this->identify,
			'total' => $this->total,
			'status' => $this->status,
			'comment' => $this->comment ?? '',
			'client' => $this->client_id ? ClientResource::make($this->client) : null,
			'table' => $this->table_id ? TableResource::make($this->table) : null,
			'products' => ProductResource::collection($this->products),

			'created_at' => $this->created_at,

		];
	}
}
