<?php

namespace App\Utils\Validators;

use Illuminate\Validation\Rule;

trait  EmployeeValidator{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function storeRules()
    {
        return [
            'name' => ['required', 'string',
                Rule::unique('employees'),
            ],
            'salary' => ['required'],
            'email' => ['required'],
            'nid' => ['required'],
            'date_joining' => ['required'],
            'phone' => ['required', 'string', Rule::unique('employees')],
            'address' => ['nullable'],

        ];
    }

    public static function updateRules($id): array
    {
        return [
            'name' => ['required', 'string',
                Rule::unique('employees'),
            ],
            'salary' => ['required'],
            'email' => ['required'],
            'nid' => ['required'],
            'date_joining' => ['required'],
            'phone' => ['required', 'string', Rule::unique('employees')],
            'address' => ['nullable'],

        ];
    }

    public static function errorMessages(): array
    {
        return [
        ];
    }
}
