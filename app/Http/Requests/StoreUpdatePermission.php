<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermission extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => "required|min:3|max:255|unique:permissions,name,{$this->segment(3)},id",
			'description' => 'nullable|min:3|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
