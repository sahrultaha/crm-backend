<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PackStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'number' => [
                'required',
                'numeric',
                'integer',
            ],
            'imsi' => [
                'required',
                'numeric',
                'integer',
            ],
            'pin' => [
                'required',
                'numeric',
                'integer',
            ],
            'puk_1' => [
                'required',
                'numeric',
                'integer',
            ],
            'puk_2' => [
                'required',
                'numeric',
                'integer',
            ],
            'product_id' => [
                'required',
                'numeric',
                'integer',
                'exists:product,id',
            ],
            'installation_date' => [
                'required',
                'date',
            ],
            'expiry_date' => [
                'required',
                'date',
            ],
        ];
    }
}
