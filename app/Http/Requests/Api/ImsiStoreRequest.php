<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ImsiStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'imsi' => [
                'required',
                'integer',
            ],
            'imsi_status_id' => [
                'required',
                'numeric',
                'integer',
                'exists:imsi_status,id',
            ],
            'imsi_type_id' => [
                'required',
                'numeric',
                'integer',
                'exists:imsi_type,id',
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
        ];
    }
}
