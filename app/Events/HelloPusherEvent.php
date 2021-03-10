<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class HelloPusherEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // *
    //  * Create a new event instance.
    //  *
    //  * @return void
     
    public $message;
    public $content;
    public function __construct(Request $r)
    {
        $this->message  = "Có bình luận mới";
        $this->content =$r->name." đã vừa bình luận";
        // dd($r->name);
    }

    // *
    //  * Get the channels the event should broadcast on.
    //  *
    //  * @return \Illuminate\Broadcasting\Channel|array
     
    public function broadcastOn()
    {
        return ['development'];
    }
}
