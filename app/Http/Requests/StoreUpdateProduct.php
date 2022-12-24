<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
{
	public function rules(): array
	{
		$rules = [
			'title' => 'required|min:3|max:255',
			'description' => 'required|min:3|max:10000',
			'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
			'image' => 'required|image',
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
