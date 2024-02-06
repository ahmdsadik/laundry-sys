<?php

namespace App\Http\Requests\Item;

use App\Enums\Roles;
use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Check if the authenticated user is an admin
        if (auth()->user()->role == Roles::ADMIN) {
            return true;
        }

        // If not, abort with a 404 error
        abort(404);
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
