<?php

namespace Tests\Unit\Listeners;

use App\Events\FileUploaded;
use App\Listeners\ProcessBulkFileImsi as Obj;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Filesystem\Factory as FileSystemManager;
use Illuminate\Contracts\Filesystem\Filesystem;
use PHPUnit\Framework\TestCase;

class ProcessBulkFileImsiTest extends TestCase
{
    protected $obj;

    protected $manager;

    protected $filesystem;

    protected $event;

    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->manager = $this->getMockBuilder(FilesystemManager::class)
            ->getMock();
        $this->event = $this->getMockBuilder(FileUploaded::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->filesystem = $this->getMockBuilder(Filesystem::class)
            ->getMock();
        $this->manager->expects($this->any())
            ->method('disk')
            ->willReturn($this->filesystem);
        $this->repository = $this->getMockBuilder(RepositoryInterface::class)
            ->getMock();
        $this->obj = new Obj($this->manager, $this->repository);
    }

    public function test_instance()
    {
        $this->assertInstanceOf(Obj::class, $this->obj);
    }

    public function test_handle_ignored_category()
    {
        $file = (object) [
            'id' => 1,
            'filepath' => 'filepath',
            'file_category_id' => 1,
        ];
        $this->setFile($file);
        $this->obj->handle($this->event);
    }

    public function test_upload_empty()
    {
        $this->expectException(\RuntimeException::class);
        $file = (object) [
            'id' => 1,
            'filepath' => 'filepath',
            'file_category_id' => 3,
            'filename' => 'test.csv',
        ];

        $this->setFile($file);

        $this->obj->handle($this->event);
    }

    public function test_upload_invalid_header()
    {
        $this->expectException(\RuntimeException::class);
        $file = (object) [
            'id' => 1,
            'filepath' => 'filepath',
            'file_category_id' => 3,
            'filename' => 'test.csv',
        ];

        $this->setFile($file);
        $content = <<<'EOD'
        id,imsi,pin,puk_1,puk_2,ki,network,xxx
        EOD;
        $this->setFileContent($content);

        $this->obj->handle($this->event);
    }

    public function test_upload_success_4G()
    {
        $file = (object) [
            'id' => 1,
            'filepath' => 'filepath',
            'file_category_id' => 3,
            'filename' => 'test.csv',
        ];

        $this->setFile($file);
        $content = <<<'EOD'
        id,imsi,pin,puk_1,puk_2,ki,network
        1,123456789012340,12345,123456,123456,ABCDEF012345,4G
        
        EOD;
        $this->setFileContent($content);
        $this->repository->expects($this->exactly(1))
            ->method('create')
            ->with($this->equalTo([
                'file_id' => 1,
                'imsi_type_id' => 2,
                'id' => '1',
                'imsi' => '123456789012340',
                'pin' => '12345',
                'puk_1' => '123456',
                'puk_2' => '123456',
                'ki' => 'ABCDEF012345',
                'network' => '4G',
            ]));

        $this->obj->handle($this->event);
    }

    protected function setFile($file)
    {
        $this->event->expects($this->once())
            ->method('getFile')
            ->willReturn($file);
    }

    protected function setFileContent($content)
    {
        $this->filesystem->expects($this->once())
            ->method('get')
            ->willReturn($content);
    }
}
