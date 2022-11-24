<?php

namespace App\Listeners;

use App\Events\Dispatcher;
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

    protected $dispatcher;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Factory $manager, RepositoryInterface $repo, Dispatcher $dispatcher, ?Logger $logger = null)
    {
        $this->manager = $manager;
        $this->logger = $logger;
        $this->repo = $repo;
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
                $header = ['file_id', 'imsi_type_id', ...$row];

                continue;
            }
            if (! $row || empty($row) || empty(array_filter($row))) {
                continue;
            }

            switch($row[6]) {
                case '3G':
                    $network = 1;
                    break;
                case '5G':
                    $network = 3;
                    break;
                default:
                    $network = \App\Models\ImsiType::FOUR_G;
            }
            $this->repo->create(array_combine($header, [$file->id, $network, ...$row]));
        }
        $this->dispatcher->dispatch(\App\Events\BulkFileImsiStored::class, $file);
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

    protected function checkHeaders(array $row)
    {
        if ($row !== ['id', 'imsi', 'pin', 'puk_1', 'puk_2', 'ki', 'network']) {
            throw new \RuntimeException('header is not the same as the template');
        }
    }
}
