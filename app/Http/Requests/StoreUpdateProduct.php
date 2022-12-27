<?php

namespace App\Http\Requests;

use App\Tenant\Rules\UniqueTenantRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
{
	public function rules(): array
	{
		$rules = [
			'title' => ['required', 'min:3', 'max:255',
				new UniqueTenantRule('products', $this->segment(3)),
			],
			'description' => ['required', 'min:3', 'max:10000'],
			'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
			'image' => ['required', 'image'],
		];

		if ($this->method() == 'PUT') {
			$rules['image'] = 'nullable|image';
		}
		return $rules;
	}

	public function authorize(): bool
	{
		return true;
	}
}
