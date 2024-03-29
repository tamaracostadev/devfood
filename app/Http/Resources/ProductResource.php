<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Product */
class ProductResource extends JsonResource
{
	/**
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request): array
	{
		return [
			'identify' => $this->uuid,
			'flag' => $this->flag,
			'title' => $this->title,
			'image' => url("storage/{$this->image}"),
			'description' => $this->description,
			'price' => $this->price,
		];
	}

}
