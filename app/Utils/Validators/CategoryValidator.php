<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 4/24/2023
 * Time: 1:22 PM
 */

namespace App\Utils\Validators;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

trait CategoryValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function storeRules()
    {
        return [
            'name' => [
                'required','string'
//                Rule::unique('categories')->ignore($user->id),
            ]
        ];
    }


    public static function updateRules($id):array
    {
        return [
            'name' => [
                'required','string',
                Rule::unique('categories'),
                ]
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


    /*public static function errorMessages(): array
    {
        return [
            'specialization_id.exists' => 'The selected specialization is invalid',
            'appointment_time_slot_id.exists' => 'The selected appointment time slot is invalid',
            'personnel_id.required_if' => 'The personnel field is required',
            'personnel_id.exists' => 'The selected personnel does not exists'
        ];
    }
    */
}