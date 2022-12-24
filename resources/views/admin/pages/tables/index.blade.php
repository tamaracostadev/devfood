@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('tables.index') }}">Mesas</a></li>
	</ol>
	<h1>Mesas</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('tables.create') }}" class="btn btn-dark">Adicionar Mesa</a>
			<form action="{{ route('tables.search') }}" method="POST" class="form form-inline float-right">
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
					<th>Identificador</th>
					<th>Descrição</th>
					<th>Status</th>
					<th>Ações</th>
				</tr>
				</thead>
				<tbody>
				@foreach($tables as $table)
					<tr>
						<td>{{ $table->id }}</td>
						<td>{{ $table->identify }}</td>
						<td>{{ $table->description }}</td>
						<td>
							@if($table->status == 'available')
								<span class="badge badge-success">Disponível</span>
							@else
								<span class="badge badge-danger">Indisponível</span>
						@endif
						<td>
							<a href="{{ route('tables.edit', ['table' => $table->id]) }}"
							   class="btn btn-info">Editar</a>
							<a href="{{ route('tables.show', ['table' => $table->id]) }}"
							   class="btn btn-warning">Ver</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
