<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
{
	public function rules(): array
	{
		return [
			'products' => ['required', 'array'],
			'products.*.identify' => ['required', 'exists:products,uuid'],
			'products.*.quantity' => ['required', 'integer'],
			'client' => ['nullable', 'exists:clients,uuid'],
			'table' => ['nullable', 'exists:tables,uuid'],
			'comment' => ['nullable', 'max:1000'],
			'token_company' => ['required', 'exists:tenants,uuid'],

		];
	}

	public function authorize(): bool
	{
		return true;
	}
}
