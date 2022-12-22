@extends('adminlte::page')

@section('title', "Planos do Perfil {$profile->name}")

@section('content_header')
	<h1>Planos do Perfil <strong>{{$profile->name}}</strong></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('profiles.plans.available', $profile->id) }}" class="btn btn-dark">Add Novo Plano</a>
			<form action="{{ route('profiles.plans', $profile->id) }}" method="POST" class="form form-inline float-right">
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
				@foreach ($plans as $plan)
					<tr>
						<td>{{ $plan->name }}</td>
						<td style="width:100px;">
							<a href="{{ route('profiles.plans.detach', [$profile->id, $plan->id]) }}" class="btn btn-danger">Desvincular</a>
						</td>
					</tr>
				@endforeach
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
