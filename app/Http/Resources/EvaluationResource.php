<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Evaluation */
class EvaluationResource extends JsonResource
{
	/**
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'stars' => $this->stars,
			'comment' => $this->comment,
			'client' => new ClientResource($this->client),
			'order' => new OrderResource($this->order),

		];
	}
}
