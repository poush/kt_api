<?php

use Dingo\Api\Http\Request;
use Dingo\Api\Transformer\Binding;
use Dingo\Api\Contract\Transformer\Adapter;

class OrdersTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform($response, $transformer, Binding $binding, Request $request)
    {
        // Make a call to your transformation layer to transformer the given response.
    }
}

