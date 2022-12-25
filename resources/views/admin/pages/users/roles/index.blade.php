@extends('adminlte::page')

@section('title', "Permissões do Usuário {$user->name}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('users.roles', $user->id) }}" class="active">Cargos</a>
		</li>
	</ol>
	<h1>Permissões do Usuário <strong>{{ $user->name }}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-dark">add novo cargo</a>
			<form action="{{ route('users.roles.available', $user->id) }}" method="POST"
				  class="form form-inline float-right">
				@csrf
				<div class="form-group">
					<input type="text" name="filter" placeholder="Nome" class="form-control"
						   value="{{ $filters['filter'] ?? '' }}">
					<button type="submit" class="btn btn-dark">Pesquisar</button>
				</div>
			</form>
		</div>
		<div class="card-body">
			@include('components.alerts')
			<table class="table table-condensed">
				<thead>
				<tr>
					<th>Nome</th>
					<th>Descrição</th>
					<th width="250px">Ações</th>
				</tr>
				</thead>
				<tbody>

				@foreach ($roles as $role)
					<tr>
						<td>{{ $role->name }}</td>
						<td>{{ $role->description }}</td>
						<td>
							<a href="{{ route('users.roles.detach', [$user->id, $role->id]) }}" class="btn btn-danger">Desvincular</a>
						</td>

					</tr>
				@endforeach

				</tbody>
			</table>

		</div>
		<div class="card-footer">
			@if (isset($filters))
				{!! $roles->appends($filters)->links() !!}
			@else
				{!! $roles->links() !!}
			@endif
		</div>
	</div>
@stop
