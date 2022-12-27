<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
{
	public function rules(): array
	{
		return [
			'name' => 'required|max:100',
			'email' => 'required|email|unique:clients,email',
			'password' => 'required|min:6|max:15|confirmed',
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}
