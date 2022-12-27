<?php

namespace App\Http\Requests;

use App\Tenant\Rules\UniqueTenantRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTable extends FormRequest
{
	public function rules(): array
	{
		return [
			'identify' => ["required", "min:1", "max:255", new UniqueTenantRule('tables', $this->segment(3))],
			'description' => ['nullable', 'min:3', 'max:255'],
			'status' => ['required', 'in:available,unavailable'],
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}
