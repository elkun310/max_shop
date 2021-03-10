<?php

// namespace App\Http\Controllers\frontend;

// use Illuminate\Broadcasting\InteractsWithSockets;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
// use Illuminate\Foundation\Events\Dispatchable;
// use Illuminate\Http\Request;
// use Illuminate\Queue\SerializesModels;

// class HelloPusherEvent implements ShouldBroadcast
// {
//     use Dispatchable, InteractsWithSockets, SerializesModels;

//     // *
//     //  * Create a new event instance.
//     //  *
//     //  * @return void
     
//     public $message;
//     // public function __construct(Request $r)
//     // {
//     //     $this->message  = $r->contents;
//     //     //dd($r->contents);
//     // }
//     public function __construct()
//     {
//         $this->message  = "Có bình luận mới";
//         //dd($this->message);
//     }

//     // *
//     //  * Get the channels the event should broadcast on.
//     //  *
//     //  * @return \Illuminate\Broadcasting\Channel|array
     
//     public function broadcastOn()
//     {
//         return ['development'];
//     }
// }
