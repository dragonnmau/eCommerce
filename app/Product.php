<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	public function paypalItem(){

		return \PaypalPayment::item()->setName($this->title)
									->setDescription($this->description)
									->setCurrency('USD')
									->setQuantity(1)
									->setPrice($this->pricing);
	}

	public function scopeLatest(){
		return $query->orderBy("id","desc");
	}

	public function scopeName($query, $name){

		//dd("Scope:". $name);
		return Product::where('title','LIKE', "%$name%");
	}
   
}
