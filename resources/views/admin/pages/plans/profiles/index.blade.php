@extends('adminlte::page')

@section('title', "Perfis do Plano {$plan->name}")

@section('content_header')
	<h1>Perfis do Plano <strong>{{$plan->name}}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-dark">Add Novo Perfil</a>
			<form action="{{ route('plans.profiles.available', $plan->id) }}" method="POST" class="form form-inline  float-right">
				@csrf
				<input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
				<button type="submit" class="btn btn-dark">Filtrar</button>
			</form>
		</div>
		<div class="card-body">
			@include('components.alerts')
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Nome</th>
						<th width="50">Ações</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($profiles as $profile)
					<tr>
						<td>{{ $profile->name }}</td>
						<td style="width:100px;">
							<a href="{{ route('plans.profiles.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger">Desvincular</a>
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
