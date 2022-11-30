<?php

namespace App\Listeners\Handlers;

class BulkFileStarterPackHandler implements BulkHandler
{
    protected $header = [
        'id',
        'imsi',
        'pin',
        'puk_1',
        'puk_2',
        'ki',
        'network',
        'number',
        'product',
    ];

    protected $repo;

    public function __construct(\App\Repositories\FileBulkStarterPackRepository $repo)
    {
        $this->repo = $repo;
    }

    public function checkHeader(array $header): bool
    {
        return $this->header === $header;
    }

    public function createRow(int $file_id, array $attributes): mixed
    {
        $attributes['file_id'] = $file_id;
        $attributes['imsi_type_id'] = $this->repo->getImsiTypeID($attributes['network']);
        $attributes['row_status_id'] = \App\Models\RowStatus::NEW;
        if (! $attributes['imsi_type_id']) {
            $attributes['row_status_id'] = \App\Models\RowStatus::FAIL;
        }

        return $this->repo->create($attributes);
    }

    public function getDispatchClass(): string
    {
        return \App\Events\BulkStarterPackStored::class;
    }
}
