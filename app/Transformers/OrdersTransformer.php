<?php

namespace App\Transformers;

use Dingo\Api\Http\Request;
use Dingo\Api\Transformer\Binding;
use Dingo\Api\Contract\Transformer\Adapter;

class OrdersTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(\App\Order $order)
    {
    	return [
    		'id' 			=> $order->id,
    		'number'		=> $order->number,
    		'customer'		=> [
    			'name'		=>	$order->customer_name,
    			'number'	=>	$order->customer_number,
    			'email'		=>	$order->customer_email,
			],
			'amount'		=> [
				'payable'	=> $order->final,
				'discount'	=> $order->discount,
				'total'		=> $order->total,

			],
			'status_code'	=> $order->status,
			'status'		=> $this->getStatus($order->status),
			'products'		=> $this->transformProducts($order->products),
			'purchased_on'	=> $order->created_at->toDateString(),
			'deliveryBy'	=> is_null($order->deliveryBy)?"":$order->deliveryBy,
			'deliveredAt'	=> is_null($order->deliveredAt)?"":$order->deliveredAt,

    	];
    }

    private function transformProducts($products)
    {
    	$data = [];
    	foreach ($products as $product) {
    		$data[] = $this->transformProduct($product);
    	}
    	return $data;
    }

    private function transformProduct(\App\orderProduct $product)
    {
    	return [
    		'code' 		=> $product->product_code,
    		'qty' 		=> $product->quantity,
    		'price' 	=> $product->price,
    		'discount' 	=> $product->discount,
    		'final' 	=> $product->final,
    		'name'		=> $product->product_name
    	];
    }

    private function getStatus($statusCode)
    {

    	switch ($statusCode) {
			case 0 :  return "Some Unknown error in database";
				break;
			case 1 :  return "In Process";
				break;
			case 2 :  return "Verified, In Process  [After OTP]";
				break;
			case 3 :  return "Processed  [After Stock Verification]";
				break;
    		case 4 :  return "Out for delivery";
    			break;
   			case 5 :  return "Delivered";
   				break;
			case 6 :  return "Cancelled";
				break;
		}
    }
}

