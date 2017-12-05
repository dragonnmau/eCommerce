@extends('layouts.app')
@section('content')
	<div class="big-padding text-center blue-grey white-text">
		<h1> Tu carrito de compras</h1>
	
	<table class="table table-bordered">
		<thead>	
			<tr>
				<td>Producto</td>
				<td>Precio</td>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{$product->title}}</td>
				<td>{{$product->pricing}}</td>
			</tr>
			@endforeach

			<tr>
				<td>Total</td>
				<td>{{$total}}</td>
			</tr>



		</tbody>
	</table>
	<div>
	@include("shopping_carts.form")
	</div>

</div>

	<h1>{{$total}}</h1>
@endsection