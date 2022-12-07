<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TenantFormRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'token_company' => 'required|exists:tenants,uuid'
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}
