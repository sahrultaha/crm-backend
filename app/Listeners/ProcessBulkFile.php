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

class ProcessBulkFile implements ShouldQueue
{
    use InteractsWithQueue;
    use LogAwareTraits;

    protected $manager;

    protected $factory;

    protected $logger;

    protected $dispatcher;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Factory $manager, Handlers\BulkHandlerFactory $factory, Dispatcher $dispatcher, ?Logger $logger = null)
    {
        $this->manager = $manager;
        $this->logger = $logger;
        $this->factory = $factory;
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
        //if ((int) $file->file_category_id !== FileCategory::BULK_IMSI) {
        if (! $this->factory->isCapable((int) $file->file_category_id)) {
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
        $handler = $this->factory->factory($file->file_category_id);
        foreach ($csv as $row) {
            if ($id === 0) {
                if (! $handler->checkHeader($row)) {
                    throw new \RuntimeException(json_encode($header));
                }
                $id++;
                $header = $row;

                continue;
            }
            if (! $row || empty($row) || empty(array_filter($row))) {
                continue;
            }

            $handler->createRow($file->id, array_combine($header, $row));
        }
        $this->dispatcher->dispatch($handler->getDispatchClass(), $file);
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

//    protected function checkHeaders(array $header)
//    {
//        if (! $this->handler->checkHeader($header)) {
//            throw new \RuntimeException(json_encode($header));
//        }
//    }
}
