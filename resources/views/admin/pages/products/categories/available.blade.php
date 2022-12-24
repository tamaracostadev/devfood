@extends('adminlte::page')

@section('title', "Categorias disponíveis para o Produto {$product->title}")

@section('content_header')
	<h1>Categorias disponíveis para o Produto <strong>{{$product->title}}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<form action="{{ route('products.categories.available', $product->id) }}" method="POST"
				  class="form form-inline ">
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
					<th>#</th>
					<th>Nome</th>
					<th>Descrição</th>
				</tr>
				</thead>
				<tbody>
				<form action="{{ route('products.categories.attach', $product->id) }}" method="POST">
					@csrf
					@foreach ($categories as $category)
						<tr>
							<td>
								<input type="checkbox" name="categories[]" value="{{ $category->id }}">
							<td>{{ $category->name }}</td>
							<td>{{ $category->description }}</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="500">
							<button type="submit" class="btn btn-success">Vincular</button>
						</td>
					</tr>
				</form>

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
