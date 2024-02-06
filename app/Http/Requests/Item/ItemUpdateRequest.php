<?php

namespace App\Http\Requests\Item;

use App\Enums\Roles;
use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Check if the authenticated user is an admin
        return auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:items,name,' . $this->item->id],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'القطعة',
        ];
    }
}
