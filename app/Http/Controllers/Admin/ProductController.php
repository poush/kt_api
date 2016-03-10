<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\regionProduct;
use App\Product;

class ProductController extends Controller
{
    public function show()
    {
    	$products = regionProduct::with('product')->get();
    	$data = [
    		'data' => $products,
    		// 'token' => csrf()
    	];
    	return response()->json($data);
    }

    public function quantity($id, $qty)
    {
        $rp = regionProduct::where('product_id',$id)->where('region_id',1)
                            ->update(['qty' => $qty]);
        if($rp)
            return $this->response->noContent();
    }

    public function delete($id)
    {
    	$product  = Product::where('id',$id)->delete();
    }

    public function disable($id, $qty)
    {
        $rp = Product::where('id',$id)->update(['status' => 1]);
        if($rp)
            return $this->response->noContent();

        return $this->response->erroBadRequest();
    }

  
}
