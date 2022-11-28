<?php

namespace App\Validations;

use App\Models\FileCategory;
use Illuminate\Support\Arr;
use Illuminate\Validation\Validator;

class FileCategoryValidator extends Validator
{
    public function validateFileCategory($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'file_category');
        $file_category = Arr::get($this->data, $parameters[0]);
        /**
         * @TODO: if we use FileCategory::BULK_FILE_IMSI it will trigger error
         * Undefined constant App\Models\FileCategory::BULK_IMSI_FILE :-(
         */
        switch ((int) $file_category) {
            case 3:
            case 4:
                return $this->validateMimetypes($attribute, $value, ['text', 'csv', 'text/csv']);
            default:
                return true;
        }
    }
}
