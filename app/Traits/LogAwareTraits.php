<?php

namespace App\Traits;

use Illuminate\Log\Logger;

trait LogAwareTraits
{
    protected $logger;

    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }

    protected function log($level, $message)
    {
        if (! $this->logger) {
            return;
        }

        $this->logger->log($level, $message);
    }
}
