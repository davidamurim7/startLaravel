@extends('painel.template.template')
@section('content')
<div class="content">
	<h1>Excluir Produto</h1>
	<hr>

	@if( isset($errors) && count($errors) > 0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		<p>{{$error}}</p>
		@endforeach
	</div>
	@endif
	<br>
	<h4><strong>Nome: </strong>{{$product->name}}</h4>
	<h4><strong>Número: </strong>{{$product->number}}</h4>
	<h4><strong>Categoria: </strong>{{$product->category}}</h4>
	<h4><strong>Ativo: </strong>{{@$product->category == 1 ? 'Sim' : 'Não'}}</h4>
	<h4><strong>Descrição: </strong>{{$product->description}}</h4>
	<br>
	<hr>
	{!! Form::open(['route' => ['produtos.destroy', $product->id], 'method' => 'DELETE']) !!}
	{{ Form::button('<span class="btn-label"><i class="glyphicon glyphicon-thumbs-up"></i></span>Confirmar', ['type' => 'submit', 'class' => 'btn btn-labeled btn-success btnDelete'] )  }}

	<a href="{{route('produtos.index')}}" class="btn btn-labeled btn-danger">
		<span class="btn-label">
			<i class="glyphicon glyphicon-thumbs-down"></i>
		</span>
		Cancelar
	</a>
	{!! Form::close() !!}
</div>

@endsection