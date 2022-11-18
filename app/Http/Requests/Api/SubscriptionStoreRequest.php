<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'exists:customer,id',
            ],
            'registration_date' => [
                'required',
                'date',
            ],
            'subscription_status_id' => [
                'required',
                'numeric',
                'integer',
                'exists:subscription_status,id',
            ],
            'subscription_type_id' => [
                'required',
                'numeric',
                'integer',
                'exists:subscription_type,id',
            ],
            'number_id' => [
                'required',
                'numeric',
                'integer',
                'exists:number,id',
            ],
            'imsi_id' => [
                'required',
                'numeric',
                'integer',
                'exists:imsi,id',
            ],
            'activation_date' => [
                'required',
                'date',
            ],
        ];
    }
}
