@extends('adminlte::page')

@section('title', 'Detalhes do plano '.$plan->name)

@section('content_header')
	<h1>Detalhes do plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark">Adicionar detalhe</a>
		</div>
		<div class="card-body">
			<ul>
				<li>
					<strong>Nome: </strong> {{ $plan->name }}
				</li>
				<li>
					<strong>URL: </strong> {{ $plan->url }}
				</li>
				<li>
					<strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
				</li>
				<li>
					<strong>Descrição: </strong> {{ $plan->description }}
				</li>
			</ul>
			@include('components.alerts')
		</div>
		<div class="card-footer">
			<form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Deletar o Plano {{ $plan->name }}</button>
				<a class="btn btn-primary" href="{{ route('plans.index') }}">Voltar</a>
			</form>
		</div>
	</div>
@stop
