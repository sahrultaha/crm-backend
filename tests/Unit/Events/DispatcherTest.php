<?php

namespace Tests\Unit\Events;

use PHPUnit\Framework\TestCase;

class DispatcherTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_dispatch()
    {
        $dispatcher = new \App\Events\Dispatcher();
        $this->assertTrue($dispatcher->dispatch(DispatcherTestSuccess::class));
    }

    public function test_dispatch_fails()
    {
        $this->expectException(\RuntimeException::class);
        $dispatcher = new \App\Events\Dispatcher();
        $this->assertTrue($dispatcher->dispatch('NonExistClass'));
    }
}

class DispatcherTestSuccess
{
    public static function dispatch()
    {
    }
}
