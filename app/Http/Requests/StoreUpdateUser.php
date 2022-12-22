<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
{
    public function rules(): array
    {
        $rules = [
			'name' => 'required|min:3|max:255',
			'email' => 'required|email|unique:users,email,' . $this->segment(3),
			'password' => 'required|min:8',
        ];

		if ($this->method() == 'PUT') {
			$rules['password'] = ['nullable', 'min:8'];
		}
		return $rules;
    }

    public function authorize(): bool
    {
        return true;
    }
}
