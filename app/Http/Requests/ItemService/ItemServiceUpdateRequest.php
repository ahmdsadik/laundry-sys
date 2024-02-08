<?php

namespace App\Http\Requests\ItemService;

use Illuminate\Foundation\Http\FormRequest;

class ItemServiceUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_id' => ['required', 'exists:services'],
            'item_id' => ['required', 'exists:items'],
            'price' => ['nullable', 'numeric']
        ];
    }

    public function attributes(): array
    {
        return [
            'service_id' => 'الخدمة',
            'item_id' => 'القطعة',
            'price' => 'السعر'
        ];
    }
}
