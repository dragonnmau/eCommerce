<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$shopping_cart = ShoppingCart::findOrCreateBySessionID(null);


        return view('home');
    }

    public function home(){



        return view('main.home');   


    }
}
