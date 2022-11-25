<?php

namespace App\Listeners;

use App\Events\Dispatcher;
use App\Events\FileUploaded;
use App\Traits\LogAwareTraits;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Log\Logger;
use Illuminate\Queue\InteractsWithQueue;
use Psr\Log\LogLevel;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

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
        $this->log(LogLevel::DEBUG, __METHOD__);
        $file = $event->getFile();
        if (! $this->factory->isCapable((int) $file->file_category_id)) {
            return;
        }

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
                    throw new UnprocessableEntityHttpException('Invalid CSV header '.implode(',', $row));
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

        return $this->factory->isCapable($file->file_category_id);
    }
}
