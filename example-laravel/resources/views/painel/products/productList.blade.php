@extends('painel.template.template')
@section('content')


<div class="content">
	<div class="text-center">
		<h1>Listagem de Produtos</h1>
	</div>
	<hr>
	<a href="{{route('produtos.create')}}" class="btn btn-md btn-labeled btn-primary">
		<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Cadastrar
	</a>
	<br>

	<table id="table-produtos" class="table table-striped">
		<tr>
			<th>Nome</th>
			<th>Número</th>
			<th>Categoria</th>
			<th>Ativo</th>
			<th>Descrição</th>
			<th>Ações</th>
		</tr>
		@foreach($produtos as $produto)
		<tr>
			<td>{{$produto->name}}</td>
			<td>{{$produto->number}}</td>
			<td>{{$produto->category}}</td>
			<td>{{@$produto->active == 1 ? 'Sim' : 'Não'}}</td>
			<td>{{$produto->description}}</td>
			<td>
				<a href="{{route('produtos.edit', $produto->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
				<a href="{{route('produtos.show', $produto->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
			</td>
		</tr>
		@endforeach
	</table>

	{!! $produtos->links('pagination::bootstrap-4') !!}
</div>

@endsection