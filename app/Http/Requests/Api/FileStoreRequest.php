<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
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
            'file' => [
                'required',
                'file',
                'max:5000',
                'file_category:file_category_id',
            ],
            'relation_id' => [
                'integer',
            ],
            'relation_type_id' => [
                'integer',
                'exists:file_relation_type,id',
            ],
            'file_category_id' => [
                'required',
                'exists:file_category,id',
            ],
        ];
    }
}
