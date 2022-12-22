@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
	</ol>
	<h1>Permissões</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('permissions.create') }}" class="btn btn-dark">Adicionar Permissão</a>
			<form action="{{ route('permissions.search') }}" method="POST" class="form form-inline float-right">
				@csrf
				<div class="form-group">
					<input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
					<button type="submit" class="btn btn-dark">Pesquisar</button>
				</div>
			</form>
		</div>
		<div class="card-body">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Nome</th>
						<th  style="width:200px;">Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($permissions as $permission)
						<tr>
							<td>{{ $permission->name }}</td>
							<td>
								<a href="{{ route('permissions.edit', $permission) }}" class="btn btn-info">EDIT</a>
								<a href="{{ route('permissions.show', $permission) }}" class="btn btn-warning">VER</a>
								<a href="{{ route('permissions.profiles', $permission) }}" class="btn btn-info"><i class="fas fa-address-book"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
