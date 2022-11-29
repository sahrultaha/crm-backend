<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class NumberStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'number' => [
                'required',
            ],
            'number_type_id' => [
                'required',
                'numeric',
                'integer',
                'exists:number_type,id',
            ],
            'number_status_id' => [
                'required',
                'numeric',
                'integer',
                'exists:number_status,id',
            ],
            'number_category_id' => [
                'required',
                'numeric',
                'integer',
                'exists:number_category,id',
            ],
        ];
    }
}
