<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{

	protected $fillable = ["status"];

	public function inShoppingCarts(){
		return $this->hasMany('App\inShoppingCarts');
	}

	public function products(){
		return $this->belongsToMany('App\Product', 'in_shopping_carts');
	}

	public function productsSize(){
		return $this->products()->count();
	}

	public function total(){
		return $this->products()->sum("pricing");
	}



    public static function findOrCreateBySessionID($shopping_cart_id){
    	if($shopping_cart_id)
    		//buscar carrito con este id
    		return ShoppingCart::findBySession($shopping_cart_id);
    	else
    		//crear un carrito
    		return ShoppingCart::createWithoutSession($shopping_cart_id);
    }
	
	

	public static function findBySession($shopping_cart_id){
		return ShoppingCart::find($shopping_cart_id);
	}

	


	public static function createWithoutSession(){

		return ShoppingCart::create([
			"status"=> "incompleted"
			]);

		 /*Sesion sin laravel,
		$shopping_cart = new ShoppingCart;

		$shopping_cart->status = "incopleted";

		$shopping_cart->save();

		return $shopping_cart;*/
	}


}
