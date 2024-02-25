<?php

namespace App\Utils\Validators;

use Illuminate\Validation\Rule;

trait CustomerValidator
{
    public static function storeRules()
    {
        return [
            'name' => ['required', 'string',
                Rule::unique('customers'),
            ],
            'email' => ['nullable'],
            'photo' => ['nullable'],
            'phone' => ['nullable'],
            'address' => ['nullable'],
        ];
    }

    public static function updateRules($id): array
    {
        return [
            'name' => ['required', 'string',
//                Rule::unique('customers'),
            ],
            'email' => ['nullable'],
            'photo' => ['nullable'],
            'phone' => ['nullable'],
            'address' => ['nullable'],

        ];
    }

    public static function errorMessages(): array
    {
        return [
        ];
    }
}
