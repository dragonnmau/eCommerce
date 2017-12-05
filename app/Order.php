<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $fillable = ['recipient_name','line1','line2','city','country_code','state','postal_code','email','shopping_cart_id','status','total','guide_number'];

    public static function createFromPayPalResponse($response, $shopping_cart){

    	$payer = $response->payer;

    	$orderData = (array) $payer->payer_info->shipping_address;

    	$orderData = $orderData[key($orderData)];

    	$orderData["email"] = $payer->payer_info->email;
    	$orderData["total"] = $shopping_cart->total();
    	$orderdata["shopping_cart_id"] = $shopping_cart->id;

    	return $orderdata["shopping_cart_id"];

    	//return Order::create($orderData);    	
    }
}
