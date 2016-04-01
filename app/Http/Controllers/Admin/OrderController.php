<?php


/**
 *  OrderController - Admin Panel
 *  Piyush <alltimepresent@gmail.com> 
 *  2016
 */

/*
	Order Status Codes

	0 => Some Unknown error in database

	1 => In Process

	2 => Verified, In Process  [After OTP]

	3 => Processed  [After Stock Verification]

    4 => Out for delivery
    
    5 => Delivered
        
	6 => Cancelled
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Events\OrderPlaced;

use App\Order;
use App\orderProduct;
use App\Product;
use App\regionproduct;

use App\TransFormers\OrdersTransformer;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy('created_at','desc')->paginate(12);
        return $this->response->paginator($orders, new \App\Transformers\OrdersTransformer);
    }

    public function cells()
    {
        $data = Order::select(\DB::raw('count(id) as n,status'))
                        ->groupBy('status')
                        ->get();
        $dat = [];
        foreach ($data as $value) {
        	$dat['status_'.$value->status] = $value->n;
        }

        return $dat;
    }


    public function stats()
	{
        $data['delivered'] = Order::select(\DB::raw('created,status,count(id) as total'))
                        ->where('status',1)
                        ->groupBy('created')
                        ->orderBy('created','asc')
                        ->take(10)
                        ->get();
        $data['cancelled'] = Order::select(\DB::raw('created,status,count(id) as total'))
                        ->where('status',6)
                        ->groupBy('created')
                        ->orderBy('created','asc')
                        ->take(10)
                        ->get();

        $dat=[];
        foreach ($data['delivered'] as $key => $item) {
            $dat[] = [$item->created, $item->total];
        }
        $data['delivered'] = $dat;

        $dat=[];
        foreach ($data['cancelled'] as $key => $items) {
            $dat[] = [$key, $items->count()];
        }
        $data['cancelled'] = $dat;
        return 
        [
            [
                "label" => "Delivered",
                "color" => "#2DBD9B",
                "data" => $data['delivered']
            ],
            [
                "label" => "Cancelled",
                "color" => "#F24F4B",
                "data" => $data['cancelled']
            ],

        ];
        return $this->response->array($data);
	}

	public function show($id)
	{
		$order = Order::where('id',$id)->with('products')->get();
		
        if(!$order->isEmpty())
            return $this->response->item($order->first(),new \App\Transformers\OrderTransformer);
		else
			return $this->response->errorNotFound();
	}
    public function cancel($id){
    	$order = Order::where('id' ,$id)->update(['status' => 6]);

    	if($order)
    		return $this->response->array([1]);
    }


    public function verify($id)
    {
    	$order = Order::where('id',$id)->update(['status' => 2]);
    	
    	if($order)
    		return $this->response->noContent();
    	else
    		return $this->response->errorBadRequest(' Invalid Order');
    }

    public function proccess($id)
    {
    	$order = Order::where('id',$id)->update(['status' => 3]);
    	
    	if($order)
    		return $this->response->noContent();
    	else
    		return $this->response->errorBadRequest(' Invalid Order');
    }

    public function delivered($id)
    {
    	$order = Order::where('id',$id)->update(['status' => 5]);
    	
    	if($order)
    		return $this->response->noContent();
    	else
    		return $this->response->errorBadRequest(' Invalid Order');
    }

}
