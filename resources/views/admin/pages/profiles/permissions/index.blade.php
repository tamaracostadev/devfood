@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('profiles.permissions', $profile->id) }}" class="active">Permissões</a></li>
	</ol>
	<h1>Permissões do Perfil <strong>{{ $profile->name }}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark">add nova permissão</a>
			<form action="{{ route('profiles.permissions.available', $profile->id) }}" method="POST" class="form form-inline float-right">
				@csrf
				<div class="form-group">
					<input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
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

						@foreach ($permissions as $permission)
							<tr>
								<td>{{ $permission->name }}</td>
								<td>{{ $permission->description }}</td>
								<td>
									<a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger">Desvincular</a>
								</td>

							</tr>
						@endforeach

				</tbody>
			</table>

		</div>
		<div class="card-footer">
			@if (isset($filters))
				{!! $permissions->appends($filters)->links() !!}
			@else
				{!! $permissions->links() !!}
			@endif
		</div>
	</div>
@stop
