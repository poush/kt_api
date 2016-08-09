<?php

namespace App\Transformers;

use Dingo\Api\Http\Request;
use Dingo\Api\Transformer\Binding;
use Dingo\Api\Contract\Transformer\Adapter;

class ProductsTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(\App\regionProduct $product)
    {
    	return [
            'code'  => $product->product['code'],
            'image' => $product->product['image'],
            'qty'   => 0,
            'name'  => $product->product['name'],
            'price'     => $product->price,
            'sprice'    => $product->price - $product->discount,
            'discount'  => $product->discount,
            'stock'     => $product->stock

    	];
    }
}
