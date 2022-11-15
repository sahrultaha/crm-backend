<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use App\Models\FileCategory;
use App\Repositories\RepositoryInterface;
use App\Traits\LogAwareTraits;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Log\Logger;
use Illuminate\Queue\InteractsWithQueue;
use Psr\Log\LogLevel;

class ProcessBulkFileImsi implements ShouldQueue
{
    use InteractsWithQueue;
    use LogAwareTraits;

    protected $manager;

    protected $repo;

    protected $logger;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Factory $manager, RepositoryInterface $repo, ?Logger $logger = null)
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
        $this->log(LogLevel::DEBUG, __METHOD__);
        $file = $event->getFile();

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

    /**
     * Handle the event.
     *
     * @param  \App\Events\FileUploaded  $event
     * @return bool
     */
    public function shouldQueue(FileUploaded $event)
    {
        $file = $event->getFile();

        return (int) $file->file_category_id === FileCategory::BULK_IMSI_FILE;
    }

    protected function checkHeaders(array $row)
    {
        if ($row !== ['id', 'imsi', 'pin', 'puk_1', 'puk_2', 'ki', 'network']) {
            throw new \RuntimeException('header is not the same as the template');
        }
    }
}
