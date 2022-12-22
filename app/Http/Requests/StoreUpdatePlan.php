<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => "required|min:3|max:255|unique:plans,name,{$this->segment(3)},url",
			'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
			'description' => 'nullable|min:3|max:255',
			];
    }

}
