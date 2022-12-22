@extends('adminlte::page')

@section('title', "Planos disponíveis para o Perfil {$profile->name}")

@section('content_header')
	<h1>Planos disponíveis para o Perfil <strong>{{$profile->name}}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<form action="{{ route('profiles.plans.available', $profile->id) }}" method="POST" class="form form-inline">
				@csrf
				<input type="text" name="filter" placeholder="Nome" class="form-control">
				<button type="submit" class="btn btn-dark">Pesquisar</button>
			</form>
		</div>
		<div class="card-body">
			@include('components.alerts')
			<table class="table table-condensed">
				<thead>
				<tr>
					<th>Nome</th>
				</tr>
				</thead>
				<tbody>
				<form action="{{ route('profiles.plans.attach', $profile->id) }}" method="POST">
					@csrf
					@foreach ($plans as $plan)
						<tr>
							<td>
								<input type="checkbox" name="plans[]" value="{{ $plan->id }}">
								{{ $plan->name }}
							</td>
						</tr>
					@endforeach
					<tr>
						<td>
							<button type="submit" class="btn btn-dark">Vincular</button>
						</td>
					</tr>
				</form>
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			@if (isset($filters))
				{!! $plans->appends($filters)->links() !!}
			@else
				{!! $plans->links() !!}
			@endif
		</div>
	</div>
@stop
