<div class ="card product text-left">

			@if(Auth::check() && $product->user_id == Auth::user()->id)

			<div class="absolute actions">
				<a href="{{url('/products/'.$product->id.'/edit')}}">
					Editar
				</a>

				@include('products.delete', ['product' => $product])

			</div>

			@endif
			<h1>{{$product->title}}</h1>
			<div class="row">
				<div class ="col-sm-6 col-xs-12">
				@if($product->extension)
				<img src="{{url("/products/images/$product->id.$product->extension")}}" class = "product-avatar">

				@endif


				</div>
				<div class ="col-sm-6 col-xs-12">
					<p>
						<strong>Descripcion</strong>
					</p>
					<p>
						<strong>{{$product->description}}</strong>
					</p>
					<p>
						<strong>Precio</strong>
					</p>
					<p>
						<strong>USD:{{$product->pricing}}</strong>
					</p>
					<P>
						@include('in_shopping_carts.form' , ['product' => $product])
					</P>
				</div>
			</div>
		</div>