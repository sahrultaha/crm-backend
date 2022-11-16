<?php

namespace App\Events;

class Dispatcher
{
    public function dispatch($class)
    {
        if (! class_exists($class) || ! method_exists($class, 'dispatch')) {
            throw new \RuntimeException('class or method does not exits');
        }
        $class::dispatch();

        return true;
    }
}
