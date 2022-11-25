<?php

namespace App\Listeners\Handlers;

class BulkHandlerFactory
{
    public function factory($file_category_id): BulkHandler | null
    {
        switch ($file_category_id) {
            case \App\Models\FileCategory::BULK_IMSI:
                return app()->get(BulkFileImsiHandler::class);
        }
    }
}
