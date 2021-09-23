@extends('painel.template.template')
@section('content')
<div class="content">
	<h1>{{$title or 'Gestão de Produtos'}}</h1>
	<hr>
	@if( isset($errors) && count($errors) > 0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		<p>{{$error}}</p>
		@endforeach
	</div>
	@endif
	@if(isset($product))
	{!! Form::model($product, ['route' => ['produtos.update', $product->id], 'class' => 'form', 'method' => 'put']) !!}
	@else
	{!! Form::open(['route' => 'produtos.store', 'class' => 'form']) !!}
	@endif
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="name">Nome</label><br>
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome do produto aqui ...']) !!}
		</div>
		<div class="form-group col-md-6">
			<label for="number">Número</label><br>
			{!! Form::number('number', null, ['class' => 'form-control', 'placeholder' => 'Digite o número do produto aqui ...']) !!}
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="category">Categoria</label><br>
			{!! Form::select('category', $categorys, isset($product) ? array_keys($categorys, $product->category) : null, ['class' => 'form-control catSelect']) !!}
		</div>
		<div class="form-group col-md-6">
			<div class="form-check">
				<br>
				<label>
					{!! Form::checkbox('active') !!}
					Ativo
				</label>
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="description">Descrição</label>
			{!! Form::textarea('description', null, ['rows' => '5', 'class' => 'form-control', 'placeholder' => 'Digite a descrição do produto aqui ...']) !!}
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-12">
			<hr>
			{{ Form::button('<span class="btn-label"><i class="glyphicon glyphicon-thumbs-up"></i></span>Confirmar', ['type' => 'submit', 'class' => 'btn btn-labeled btn-success'] )  }}

			<a href="{{route('produtos.index')}}" class="btn btn-labeled btn-danger">
				<span class="btn-label">
					<i class="glyphicon glyphicon-thumbs-down"></i>
				</span>
				Cancelar
			</a>
		</div>
	</div>
	{!! Form::close() !!}

</div>


@endsection