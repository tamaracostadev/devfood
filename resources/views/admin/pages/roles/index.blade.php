@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('roles.index') }}">Cargos</a></li>
	</ol>
	<h1>Cargos</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('roles.create') }}" class="btn btn-dark">Adicionar Cargo</a>
			<form action="{{ route('roles.search') }}" method="POST" class="form form-inline float-right">
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
					<th>Nome</th>
					<th style="width:300px;">Ações</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($roles as $role)
					<tr>
						<td>{{ $role->name }}</td>
						<td>
							<a href="{{ route('roles.edit', $role) }}" class="btn btn-info">EDIT</a>
							<a href="{{ route('roles.show', $role) }}" class="btn btn-warning">VER</a>
							<a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-primary"><i
									class="fas fa-lock"></i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
