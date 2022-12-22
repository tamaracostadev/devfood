<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategory extends FormRequest
{
	public function rules(): array
	{
		$id = $this->segment(3);
		return [
			'name' => "required|min:3|max:255|unique:categories,name,{$id},id",
			'description' => 'required|min:3|max:10000',
		];
	}

	public function authorize(): bool
	{
		return true;
	}
}
