	{!! Form::open(['url' => $url, 'method' => $method, 'files' => true])!!}
	<div class="form-group">
		{{Form::text('title',$product->title,['class' => 'form-control',
		 'placeholder' =>'Titulo...'])	}}
	</div>
	
	<div>
		{{Form::number('pricing',$product->pricing,['class' => 'form-control',
		 'placeholder' =>'Precio en centavos de dolar'])	}}
	</div>


	<div>
		{{ Form::file('cover') }}
	</div>

	<div>
		{{Form::textarea('description',$product->description,['class' => 'form-control',
		 'placeholder' =>'Describe tu producto'])	}}

	</div>

	<div class="form-group tet-right">
		<a href="{{url('/products')}}">Regresar al listado de productos</a>
		<input type="submit" value="Enviar" class="btn btn-succes">
	</div>




	{!! Form::close() !!}