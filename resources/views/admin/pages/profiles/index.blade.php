@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
	</ol>
	<h1>Perfis</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('profiles.create') }}" class="btn btn-dark">Adicionar Perfil</a>
			<form action="{{ route('profiles.search') }}" method="POST" class="form form-inline float-right">
				@csrf
				<div class="form-group">
					<input type="text" name="filter" placeholder="Nome" class="form-control"
						   value="{{ $filters['filter'] ?? '' }}">
					<button type="submit" class="btn btn-dark">Pesquisar</button>
				</div>
			</form>
		</div>
		<div class="card-body">
			<table class="c">
				<thead>
				<tr>
					<th>Nome</th>
					<th style="width:300px;">Ações</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($profiles as $profile)
					<tr>
						<td>{{ $profile->name }}</td>
						<td>
							<a href="{{ route('profiles.edit', $profile) }}" class="btn btn-info">EDIT</a>
							<a href="{{ route('profiles.show', $profile) }}" class="btn btn-warning">VER</a>
							<a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-primary"><i
									class="fas fa-lock"></i></a>
							<a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-info"><i
									class="fas fa-list-alt"></i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
