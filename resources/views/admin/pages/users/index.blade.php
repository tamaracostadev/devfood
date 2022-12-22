@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
	<h1>Usuários</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('users.create') }}" class="btn btn-dark">Adicionar Usuário</a>
			<form action="{{ route('users.search') }}" method="POST" class="form form-inline float-right">
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
						<th>Id</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
								<a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">Ver</a>
								<form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger">Deletar</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
