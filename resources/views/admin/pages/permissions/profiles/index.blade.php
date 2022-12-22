@extends('adminlte::page')

@section('title', "Perfis com a permissão {$permission->name}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('permissions.profiles', $permission->id) }}" class="active">Perfis</a></li>
	</ol>
	<h1>Perfis com a permissão <strong>{{ $permission->name }}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<form action="{{ route('permissions.profiles', $permission->id) }}" method="POST" class="form form-inline float-right">
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

						@foreach ($profiles as $profile)
							<tr>
								<td>{{ $profile->name }}</td>
								<td>{{ $profile->description }}</td>
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
				{!! $profiles->appends($filters)->links() !!}
			@else
				{!! $profiles->links() !!}
			@endif
		</div>
	</div>
@stop
