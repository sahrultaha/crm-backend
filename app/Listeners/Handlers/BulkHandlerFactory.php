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
            case FileCategory::BULK_STARTER_PACK:
                return app()->get(BulkFileStarterPackHandler::class);
        }
    }

    public function isCapable($file_category_id)
    {
        return in_array($file_category_id, [FileCategory::BULK_IMSI, FileCategory::BULK_STARTER_PACK]);
    }
}
