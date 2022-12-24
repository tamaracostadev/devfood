<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTable extends FormRequest
{
	public function rules(): array
	{
		return [
			'identify' => "required|min:1|max:255|unique:tables,identify,{$this->segment(3)},id",
			'description' => 'nullable|min:3|max:255',
			'status' => 'required|in:available,unavailable',
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}
