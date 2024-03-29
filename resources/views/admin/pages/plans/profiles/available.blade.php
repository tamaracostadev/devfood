@extends('adminlte::page')

@section('title', "Perfis disponíveis para o Plano {$plan->name}")

@section('content_header')
	<h1>Perfis disponíveis para o Plano <strong>{{$plan->name}}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<form action="{{ route('plans.profiles.available', $plan->id) }}" method="POST" class="form form-inline ">
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
						<th>#</th>
						<th>Nome</th>
						<th>Descrição</th>
					</tr>
				</thead>
				<tbody>
				<form action="{{ route('plans.profiles.attach', $plan->id) }}" method="POST">
					@csrf
					@foreach ($profiles as $profile)
						<tr>
							<td>
								<input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
							<td>{{ $profile->name }}</td>
							<td>{{ $profile->description }}</td>
							</td>
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
				{!! $profiles->appends($filters)->links() !!}
			@else
				{!! $profiles->links() !!}
			@endif
		</div>
	</div>
@stop
