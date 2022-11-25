<?php

namespace App\Listeners;

use App\Events\Dispatcher;
use App\Events\FileUploaded;
use App\Models\FileCategory;
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

    protected $handler;

    protected $logger;

    protected $dispatcher;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Factory $manager, Handlers\BulkHandler $handler, Dispatcher $dispatcher, ?Logger $logger = null)
    {
        $this->manager = $manager;
        $this->logger = $logger;
        $this->handler = $handler;
        $this->dispatcher = $dispatcher;
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

        if ((int) $file->file_category_id !== FileCategory::BULK_IMSI) {
            return;
        }
        $this->log(LogLevel::DEBUG, __METHOD__."processing {$file->id} {$file->filename}");
        $tmp = tempnam(sys_get_temp_dir(), 'bulkimsi');
        $content = $this->manager->disk('s3')->get($file->filepath);
        if (! $content) {
            throw new \RuntimeException("{$file->filename} is empty");
        }
        file_put_contents($tmp, $content);

        $csv = new \SplFileObject($tmp);
        $csv->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY);
        $id = 0;
        $header = [];

        foreach ($csv as $row) {
            if ($id === 0) {
                $this->checkHeaders($row);
                $id++;
                $header = $row;

                continue;
            }
            if (! $row || empty($row) || empty(array_filter($row))) {
                continue;
            }

            $this->handler->createRow($file->id, array_combine($header, $row));
        }
        $this->dispatcher->dispatch($this->handler->getDispatchClass(), $file);
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

        return (int) $file->file_category_id === FileCategory::BULK_IMSI;
    }

    protected function checkHeaders(array $header)
    {
        if (! $this->handler->checkHeader($header)) {
            throw new \RuntimeException(json_encode($header));
        }
    }
}
