<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ShoppingCart;

use App\PayPal;

class ShoppingCartsController extends Controller
{

	public function checkout(){

        
        $shopping_cart_id = \Session::get('shopping_cart_id');
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id); 
       
        $paypal = new PayPal($shopping_cart);
		
         $payment = $paypal->generate();

         return redirect($payment->getApprovalLink());
	}


    public function index(){
    	$shopping_cart_id = \Session::get('shopping_cart_id');

    	$shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

        
        //return "Hola";


    	$products = $shopping_cart->products()->get();

    	$total = $shopping_cart->total();

    	return view("shopping_carts.index", ["products" => $products, "total" => $total]);

    }

}
