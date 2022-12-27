<?php

namespace App\Http\Requests\Api;

use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class StoreEvaluationOrder extends FormRequest
{
	public function rules(): array
	{
		return [
			'stars' => ['required', 'integer', 'between:1,5'],
			'comment' => ['nullable', 'string', 'min:3', 'max:1000'],
		];
	}

	public function authorize(): bool
	{
		$client = auth()->user();

		$order = app(OrderRepositoryInterface::class)->getOrderByIdentify($this->identify);
		if (!$order || !$client) {
			return false;
		}

		return $client->id === $order->client_id;
	}
}
