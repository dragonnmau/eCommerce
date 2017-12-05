<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ShoppingCart;

use App\Product;

class MainController extends Controller
{
   public function home(){

   	$products = Product::all();

   	return view('main.home',["products" => $products]);
   }

   public function aviso(){

   	return view('/aviso');
   }

   public function conditions(){

   	return view('/conditions');
   }
}
