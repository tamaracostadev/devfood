@extends('adminlte::page')

@section('title', "Categorias do Produto {$product->title}")

@section('content_header')
	<h1>Categorias do Produto <strong>{{$product->title}}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('products.categories.available', $product->id) }}" class="btn btn-dark">Add Nova
				Categoria</a>
			<form action="{{ route('products.categories.available', $product->id) }}" method="POST"
				  class="form form-inline  float-right">
				@csrf
				<input type="text" name="filter" placeholder="Nome" class="form-control"
					   value="{{ $filters['filter'] ?? '' }}">
				<button type="submit" class="btn btn-dark">Filtrar</button>
			</form>
		</div>
		<div class="card-body">
			@include('components.alerts')
			<table class="table table-condensed">
				<thead>
				<tr>
					<th>Nome</th>
					<th width="50">Ações</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($categories as $category)
					<tr>
						<td>{{ $category->name }}</td>
						<td style="width:100px;">
							<a href="{{ route('products.categories.detach', [$product->id, $category->id]) }}"
							   class="btn btn-danger">Desvincular</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			@if (isset($filters))
				{!! $categories->appends($filters)->links() !!}
			@else
				{!! $categories->links() !!}
			@endif
		</div>
	</div>
@stop
