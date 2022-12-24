@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}">Empresas</a></li>
	</ol>
	<h1>Empresas</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('tenants.create') }}" class="btn btn-dark">Adicionar Empresa</a>
			<form action="{{ route('tenants.search') }}" method="POST" class="form form-inline float-right">
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
					<th>Nome</th>
					<th>Email</th>
					<th>Ações</th>
				</tr>
				</thead>
				<tbody>
				@foreach($tenants as $tenant)
					<tr>
						<td>{{ $tenant->id }}</td>
						<td width="200px"><img class="img-thumbnail" src="{{asset("/storage/{$tenant->logo}")}}"
											   alt="{{$tenant->name}}">
						</td>
						<td>{{ $tenant->name }}</td>
						<td>{{ $tenant->email }}</td>
						<td>
							<a href="{{ route('tenants.edit', ['tenant' => $tenant->id]) }}"
							   class="btn btn-info">Editar</a>
							<a href="{{ route('tenants.show', ['tenant' => $tenant->id]) }}"
							   class="btn btn-warning">Ver</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
