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
                'nullable',
                'email',
            ],
            'mobile_number' => [
                'nullable',
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
                'nullable',
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
                'nullable',
                'numeric',
                'integer',
                'exists:customer_title,id',
            ],
            'birth_date' => [
                'required',
                'date',
            ],
            'village_id' => [
                'nullable',
                'exists:village,id',
            ],
            'district_id' => [
                'nullable',
                'exists:district,id',
            ],
            'mukim_id' => [
                'nullable',
                'exists:mukim,id',
            ],
            'postal_code_id' => [
                'nullable',
                'exists:postal_code,id',
            ],
            'house_number' => [
                'nullable',
            ],
            'simpang' => [
                'nullable',
            ],
            'street' => [
                'nullable',
            ],
            'building_name' => [
                'nullable',
            ],
            'block' => [
                'nullable',
            ],
            'floor' => [
                'nullable',
            ],
            'unit' => [
                'nullable',
            ],
            'address_type_id' => [
                'nullable',
            ],
        ];
    }
}
