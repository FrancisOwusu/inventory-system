<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/27/2023
 * Time: 5:17 AM.
 */

namespace App\Utils\Validators;

use Illuminate\Validation\Rule;

trait SupplierValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function storeRules()
    {
        return [
            'name' => ['required', 'string',
                Rule::unique('suppliers'),
            ],
            'email' => ['required', 'string', Rule::unique('suppliers')],
            'phone' => ['required', 'string', Rule::unique('suppliers')],
            'shopname' => ['nullable'],
            'address' => ['nullable'],
        ];
    }

    public static function updateRules($id): array
    {
        return [
            'name' => ['required', 'string',
                //                Rule::unique('categories')->ignore($user->id),
            ],
            'email' => ['required', 'string', Rule::unique('suppliers')],
            'phone' => ['required', 'string', Rule::unique('suppliers')],
            'shopname' => ['nullable'],
            'address' => ['nullable'],
        ];
    }

    public static function errorMessages(): array
    {
        return [
        ];
    }
}
