<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use App\Models\FileCategory;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Facades\Log;

class ProcessBulkFileImsi
{
    protected $manager;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(FilesystemManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\FileUploaded  $event
     * @return void
     */
    public function handle(FileUploaded $event)
    {
        $file = $event->getFile();
        Log::debug(__METHOD__.json_encode($file));

        if ((int) $file->file_category_id !== FileCategory::BULK_IMSI_FILE) {
            return;
        }
        \Illuminate\Support\Facades\Log::debug('hereeee');
        $tmp = tempnam(sys_get_temp_dir(), 'bulkimsi');
        $content = $this->manager->disk('s3')->get($file->filepath);
        file_put_contents($tmp, $content);

        $csv = new \SplFileObject($tmp);
        $csv->setFlags(\SplFileObject::READ_CSV);
        foreach ($csv as $row) {
            \Illuminate\Support\Facades\Log::debug(implode('', $row));
        }
        unlink($tmp);
    }
}
