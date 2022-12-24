@extends('adminlte::page')

@section('title', "Produtos da Categoria {$category->name}")

@section('content_header')
	<h1>Produtos da Categoria <strong>{{$category->name}}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('categories.products.available', $category->id) }}" class="btn btn-dark">Add
				Produto</a>
			<form action="{{ route('categories.products.available', $category->id) }}" method="POST"
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
					<th>Título</th>
					<th width="50">Ações</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($products as $product)
					<tr>
						<td>{{ $product->title }}</td>
						<td style="width:100px;">
							<a href="{{ route('categories.products.detach', [$category->id, $product->id]) }}"
							   class="btn btn-danger">Desvincular</a>
						</td>
					</tr>
				@endforeach
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
