<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
    	return $this->hasMany('App\orderProduct');
    }

    public static function generateNumber($length = 6) {
    	$number = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);

    	if( ! is_null(Order::where('number', $number)->first()) )
    		return self::generateNumber();

    	return $number;
	}
}
