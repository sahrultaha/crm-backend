<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use App\Models\FileCategory;
use App\Traits\LogAwareTraits;
use Illuminate\Contracts\Filesystem\Factory as FileSystemManager;
use Illuminate\Log\Logger;
use Psr\Log\LogLevel;

class ProcessBulkFileImsi
{
    use LogAwareTraits;

    protected $manager;

    protected $logger;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(FilesystemManager $manager, ?Logger $logger = null)
    {
        $this->manager = $manager;
        $this->logger = $logger;
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
        $this->log(LogLevel::DEBUG, __METHOD__.json_encode($file));

        if ((int) $file->file_category_id !== FileCategory::BULK_IMSI_FILE) {
            return;
        }
        $tmp = tempnam(sys_get_temp_dir(), 'bulkimsi');
        $content = $this->manager->disk('s3')->get($file->filepath);
        if (! $content) {
            throw new \RuntimeException("{$file->filename} is empty");
        }
        file_put_contents($tmp, $content);

        $csv = new \SplFileObject($tmp);
        $csv->setFlags(\SplFileObject::READ_CSV);
        $id = 0;
        foreach ($csv as $row) {
            if ($id === 0) {
                $this->checkHeaders($row);
                $id++;

                continue;
            }
            $this->log(LogLevel::DEBUG, implode(',', $row));
        }
        if (file_exists($tmp)) {
            unlink($tmp);
        }
    }

    protected function checkHeaders(array $row)
    {
        if ($row !== ['id', 'imsi', 'pin', 'puk_1', 'puk_2', 'ki', 'network']) {
            throw new \RuntimeException('header is not the same as the template');
        }
    }
}
