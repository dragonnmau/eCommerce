<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{

    public function __construct(){
        $this->middleware("auth",["except" => "show"]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('name')!="")
        {
            $products = Product::name($request->name)->orderBy('id')->get();
            //$nom = $request->name;

            //$products = Product::select('*')->where('title', '=', '$nom');
            //dd($products);
            //return view("");
            //return $products; 
            return view("products.search", ["products" => $products]);
        }
        
        $products = Product::all();
              
        return view("products.index", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        return view("products.create",["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasFile = $request->hasFile('cover') && $request->cover->isValid();
        
        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->pricing = $request->pricing;
        $product->user_id = Auth::user()->id;

        if($hasFile){
        $extension = $request->cover->extension();
        $product->extension = $extension;
        }

        if($product->save()){
            if($hasFile){
            $request->cover->storeAs('images', "$product->id.$extension");

            }

            return redirect("/products");
        }else{
            return view("products.create",["product" => $product]);
        }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view("products.edit",["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->pricing = $request->pricing;
        

        if($product->save()){
            return redirect("/products");
        }else{
            return view("products.edit",["product" => $product]);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/products');
    }

    public function search(Request $request){
        
        //$products = Product::name($request->get('name'));   
        $product = Product::select('*')->where('title','=','Halo 5')->get() ;
        //dd($product);
        return view("products.search",["product" => $product]);
    }
}
