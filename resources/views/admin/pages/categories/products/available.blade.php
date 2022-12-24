@extends('adminlte::page')

@section('title', "Produtos disponíveis para a Categoria {$category->name}")

@section('content_header')
	<h1>Produtos disponíveis para a Categoria <strong>{{$category->name}}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<form action="{{ route('categories.products.available', $category->id) }}" method="POST"
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
					<th>Título</th>
					<th>Preço</th>
					<th>Descrição</th>
				</tr>
				</thead>
				<tbody>
				<form action="{{ route('categories.products.attach', $category->id) }}" method="POST">
					@csrf
					@foreach ($products as $product)
						<tr>
							<td>
								<input type="checkbox" name="products[]" value="{{ $product->id }}">
							<td>{{ $product->title }}</td>
							<td>R$ {{ number_format($product->price,2,',','.') }}</td>
							<td>{{ $product->description }}</td>
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
				{!! $products->appends($filters)->links() !!}
			@else
				{!! $products->links() !!}
			@endif
		</div>
	</div>
@stop
