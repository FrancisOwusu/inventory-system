<?php

namespace App\Utils\Validators;

use Illuminate\Validation\Rule;

trait ExpenseValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function storeRules()
    {
        return [
            'details' => [
                'required',

            ],
            'amount' => ['required'],
        ];
    }

    public static function updateRules($id): array
    {
        return [
            'details' => [
                'required', 'string'
            ],
            'amount' => ['required'],
        ];

        //                'required|unique:categories|max:255',
        //            'body' => 'required',
        //        ];
    }

    public static function errorMessages(): array
    {
        return [
        ];
    }


}
