<?php

namespace App\Utils\Validators;

use Illuminate\Validation\Rule;

trait ProductValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function storeRules()
    {
        return [
            'product_name' => ['required', 'string',
                Rule::unique('products'),
            ],
            'product_code' => ['required'],
//            'root' => ['required'],
            'buying_price' => ['required'],
            'selling_price' => ['required'],
            'buying_date' => ['required'],
            'product_quantity' => ['required'],
            'supplier_id' => ['required'],
            'category_id' => ['required'],

        ];
    }

    public static function updateRules($id): array
    {
        return [
            'product_name' => ['required', 'string',
            ],
            'product_code' => ['required'],
//            'root' => ['required'],
            'buying_price' => ['required'],
            'selling_price' => ['required'],
            'buying_date' => ['required'],
            'product_quantity' => ['required'],
            'supplier_id' => ['required'],
            'category_id' => ['required'],

        ];
    }

    public static function errorMessages(): array
    {
        return [
        ];
    }
}
