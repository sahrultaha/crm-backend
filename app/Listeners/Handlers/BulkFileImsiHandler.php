<?php

namespace App\Listeners\Handlers;

class BulkFileImsiHandler implements BulkHandler
{
    protected $repo;

    public function __construct(\App\Repositories\BaseRepository $repo)
    {
        $this->repo = $repo;
    }

    public function checkHeader(array $header): bool
    {
        return $header === ['id', 'imsi', 'pin', 'puk_1', 'puk_2', 'ki', 'network'];
    }

    public function createRow(int $file_id, array $attributes): mixed
    {
        $attributes['file_id'] = $file_id;
        $imsi_type_id = \App\Models\ImsiType::FOUR_G;
        switch ($attributes['network']) {
            case '3G':
                $imsi_type_id = \App\Models\ImsiType::THREE_G;
                break;
            case '5G':
                $imsi_type_id = \App\Models\ImsiType::FIVE_G;
                break;
        }
        $attributes['imsi_type_id'] = $imsi_type_id;

        return $this->repo->create($attributes);
    }

    public function getDispatchClass(): string
    {
        return '\\'.\App\Events\BulkFileImsiStored::class;
    }
}
