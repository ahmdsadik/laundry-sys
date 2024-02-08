<?php

namespace App\Http\Requests\User;

use App\Enums\Roles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email,' . $this->user->id],
            'phone' => ['required', 'numeric', 'regex:/^01[0-9]{9}$/', 'unique:users,phone,' . $this->user->id],
            'role' => ['required', Rule::in(Roles::cases())],
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'الأسم الأول',
            'last_name' => 'الأسم الأخير',
            'email' => 'البريد',
            'phone' => 'الهاتف',
            'hire_date' => 'تاريخ التعيين',
            'role' => 'الدور',
        ];
    }

}
