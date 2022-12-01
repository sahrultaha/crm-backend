<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionStatusUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'subscription_status_id' => [
                'required',
                'numeric',
                'integer',
                'exists:subscription_status,id',
            ],
        ];
    }
}
