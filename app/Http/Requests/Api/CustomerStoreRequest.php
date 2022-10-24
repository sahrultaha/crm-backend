<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
            ],
            'mobile_number' => [
                'required',
                'string',
            ],
            'ic_number' => [
                'required',
                'string',
            ],
            'ic_type_id' => [
                'required',
                'numeric',
                'integer',
                'exists:ic_type,id',
            ],
            'ic_color_id' => [
                'required',
                'exists:ic_color,id',
            ],
            'ic_expiry_date' => [
                'required',
                'date',
            ],
            'country_id' => [
                'required',
                'exists:country,id',
            ],
            'account_category_id' => [
                'required',
                'exists:account_category,id',
            ],
            'customer_title_id' => [
                'required',
                'numeric',
                'integer',
                'exists:customer_title,id',
            ],
            'birth_date' => [
                'required',
                'date',
            ],
        ];
    }
}
