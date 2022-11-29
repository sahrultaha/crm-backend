<?php

namespace App\Listeners\Handlers;

interface BulkHandler
{
    public function checkHeader(array $header): bool;

    public function createRow(int $file_id, array $attributes): mixed;

    public function getDispatchClass(): string;
}
