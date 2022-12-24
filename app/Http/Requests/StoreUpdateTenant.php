<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTenant extends FormRequest
{
	public function rules(): array
	{
		return [
			'name' => "required|min:3|max:255|unique:tenants,name,{$this->segment(3)},id",
			'email' => 'required|email|unique:tenants,email,' . $this->segment(3),
			'logo' => 'required|image',
			'cnpj' => 'required|cnpj|digits:14|unique:tenants,cnpj,' . $this->segment(3),
			'active' => 'required|in:Y,N',

			'subscription' => 'nullable|date',
			'expires_at' => 'nullable|date',
			'subscription_id' => 'nullable|string|max:255',
			'subscription_active' => 'nullable|boolean',
			'subscription_suspended' => 'nullable|boolean',
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}
