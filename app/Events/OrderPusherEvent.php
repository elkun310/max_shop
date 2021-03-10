<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class OrderPusherEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // /**
    //  * Create a new event instance.
    //  *
    //  * @return void
    //  */
    public $message;
    public $content;
    public function __construct(Request $r)
    {
        $this->message = "Có đơn hàng mới";
        $this->content = "Hãy kiểm tra ngay";
        //dd($this->message);
    }

    // /**
    //  * Get the channels the event should broadcast on.
    //  *
    //  * @return \Illuminate\Broadcasting\Channel|array
    //  */
    public function broadcastOn()
    {
        return ['development2'];
    }
}
