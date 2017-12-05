@extends('layouts.app')
@section('title', 'Tienda UPQROO')

@section('content')
<div class="container text-center products-container">

 	
	{!! Form::open(['route' => 'products.index', 'method' => 'GET', 'role' => 'Search'])!!}

   		{!! Form::text('name', null, ['placeholder' => 'Nombre de usuario'])!!}
    	<button type="submit" class="btn btn-default">Buscar</button>

	    {!! Form::close() !!}
	@foreach($products as $product)
 		@include("products.product",["product"=> $product])

 	@endforeach
</div>

@endsection