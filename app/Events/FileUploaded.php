<?php

namespace App\Events;

use App\Models\File;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FileUploaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Models\File
     */
    protected $file;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * Get uploaded file
     *
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }
}
