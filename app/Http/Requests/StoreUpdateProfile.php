<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProfile extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => "required|min:3|max:255|unique:profiles,name,{$this->segment(3)},id",
			'description' => 'nullable|min:3|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
