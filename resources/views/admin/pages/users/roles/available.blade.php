@extends('adminlte::page')

@section('title', "Cargos disponíveis para o Usuário {$user->name}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('users.roles', $user->id) }}" class="active">Cargos</a>
		</li>
	</ol>
	<h1>Cargos disponíveis para o Usuário <strong>{{ $user->name }}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
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
					<th width="50px"><input type="checkbox" id="checkAll"></th>
					<th>Nome</th>
					<th>Descrição</th>
				</tr>
				</thead>
				<tbody>

				<form action="{{ route('users.roles.attach', $user->id) }}" method="POST">
					@csrf

					@foreach ($roles as $role)
						<tr>
							<td>
								<input type="checkbox" name="roles[]" value="{{ $role->id }}">
							</td>
							<td>{{ $role->name }}</td>
							<td>{{ $role->description }}</td>
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
				{!! $roles->appends($filters)->links() !!}
			@else
				{!! $roles->links() !!}
			@endif
		</div>
	</div>
@stop
