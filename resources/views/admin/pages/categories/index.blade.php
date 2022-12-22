@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categorias</a></li>
	</ol>
	<h1>Categorias</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('categories.create') }}" class="btn btn-dark">Adicionar Categoria</a>
			<form action="{{ route('categories.search') }}" method="POST" class="form form-inline float-right">
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
					<th>Nome</th>
					<th>Descrição</th>
					<th>Ações</th>
				</tr>
				</thead>
				<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
						<td>{{ $category->description }}</td>
						<td>
							<a href="{{ route('categories.edit', ['category' => $category->id]) }}"
							   class="btn btn-info">Editar</a>
							<a href="{{ route('categories.show', ['category' => $category->id]) }}"
							   class="btn btn-warning">Ver</a>
							<form action="{{ route('categories.destroy', ['category' => $category->id]) }}"
								  method="post" style="display: inline;">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger">Excluir</button>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
