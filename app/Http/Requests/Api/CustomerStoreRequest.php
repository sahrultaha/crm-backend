<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    private function getIcNumberRules(): array
    {
        $is_personal_ic_type = $this->request->get('ic_type_id') === 1;
        $ic_number_rules = [
            'required',
            'string',
        ];

        if ($is_personal_ic_type) {
            $ic_number_rules[] = 'regex:/^(00|01|30|31|50|51)\d{6}$/';
        }

        return $ic_number_rules;
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
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
            'country_code' => [
                'nullable',
                'integer',
            ],
            'mobile_number' => [
                'nullable',
                'integer',
            ],
            'ic_number' => $this->getIcNumberRules(),
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
                'after:today',
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
                'before_or_equal: '.date('Y-m-d', strtotime('-12 year')),
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
