@extends('adminlte::page')

@section('title', 'Produdtos')

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Produtos</a></li>
	</ol>
	<h1>Produtos</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('products.create') }}" class="btn btn-dark">Adicionar Produto</a>
			<form action="{{ route('products.search') }}" method="POST" class="form form-inline float-right">
				@csrf
				<div class="form-group">
					<input type="text" name="filter" placeholder="Nome" class="form-control"
						   value="{{ $filters['filter'] ?? '' }}">
					<button type="submit" class="btn btn-dark">Pesquisar</button>
				</div>
			</form>
		</div>
		<div class="card-body">
			<table class="table table-condensed">
				<thead>
				<tr>
					<th>#</th>
					<th>Imagem</th>
					<th>Titulo</th>
					<th>Preço</th>
					<th>Ações</th>
				</tr>
				</thead>
				<tbody>
				@foreach($products as $product)
					<tr>
						<td>{{ $product->id }}</td>
						<td width="200px"><img class="img-thumbnail" src="{{asset("/storage/{$product->image}")}}"
											   alt="{{$product->title}}">
						</td>
						<td>{{ $product->title }}</td>
						<td>{{ number_format($product->price,2,',','.') }}</td>
						<td>
							<a href="{{ route('products.edit', ['product' => $product->id]) }}"
							   class="btn btn-info">Editar</a>
							<a href="{{ route('products.show', ['product' => $product->id]) }}"
							   class="btn btn-warning">Ver</a>
							<a href="{{ route('products.categories', $product->id) }}" class="btn btn-warning"><i
									class="fas fa-tag"></i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
