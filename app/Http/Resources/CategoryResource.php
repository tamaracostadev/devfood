<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Category */
class CategoryResource extends JsonResource
{
	/**
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request): array
	{
		return [
			/* A key value pair. */
			'identify' => $this->uuid,
			'name' => $this->name,
			'url' => $this->url,
			'description' => $this->description,
		];
	}
}
