<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlacedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
       $order = $event->order;
        $raw_products = $event->products;
        
        \Slack::send(
                "=========\n Hey team !! \n We have new Order \n=======\n $order->customer_name\n $order->customer_number*\n $order->customer_email\n Final Price: Rs. ". ($order->total-$order->discount)." ```$raw_products```"
        );
        \Mail::send('emails.orderPlaced', ['data' => 'data'], function ($message) use($order) {
            $message->from('do-not-reply@KhareedTo.com','KhareedTo.com');
            $message->subject("Your order at KhareedTo");
            $message->to($order->customer_email);
        });

    }
}
