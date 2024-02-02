<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:items,name'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'القطعة',
        ];
    }
}
