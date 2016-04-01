<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\regionProduct;
use App\Transformers\ProductsTransformer;

class ProductController extends Controller
{
    public function show()
    {
    	$products = regionProduct::with('product')->get();
    	$data = [
    		'data' => $products,
    		// 'token' => csrf()
    	];
    	return $this->response->collection($products, new ProductsTransformer);
    }

    public function delete($id)
    {
    	$product  = Product::where('id',$id)->delete();
    }

  
}
