<?php

namespace App\Listeners\Handlers;

use App\Models\FileCategory;

class BulkHandlerFactory
{
    public function factory($file_category_id): BulkHandler | null
    {
        switch ($file_category_id) {
            case FileCategory::BULK_IMSI:
                return app()->get(BulkFileImsiHandler::class);
        }
    }

    public function isCapable($file_category_id)
    {
        return $file_category_id == FileCategory::BULK_IMSI;
    }
}
