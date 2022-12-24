@extends('adminlte::page')

@section('name', 'Detalhes da Empresa '.$tenant->name)

@section('content_header')
	<h1>Detalhes da Empresa <b>{{ $tenant->name }}</b></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<img class="img-thumbnail text-align-center w-25" src="{{asset("/storage/{$tenant->logo}")}}"
				 alt="{{$tenant->name}}">
			<ul>
				<li>
					<strong>Plano: </strong> {{ $tenant->plan->name }}
				</li>
				<li>
					<strong>Nome: </strong> {{ $tenant->name }}
				</li>
				<li>
					<strong>URL: </strong> {{ $tenant->url }}
				</li>
				<li>
					<strong>Email: </strong> {{ $tenant->email }}
				</li>
				<li>
					<strong>CNPJ: </strong> {{ $tenant->cnpj }}
				</li>
				<li>
					<strong>Ativo: </strong> {{ $tenant->active == 'Y' ? 'Sim' : 'Não' }}
				</li>
			</ul>

			{{--divider--}}
			<hr>
			<h5>Assinatura</h5>
			<ul>
				<li>
					<strong>Data Assinatura: </strong> {{ date('d/m/Y', strtotime($tenant->subscription)) }}
				</li>
				<li>
					<strong>Data Expira: </strong> {{ date('d/m/Y', strtotime($tenant->expires_at)) }}
				</li>
				<li>
					<strong>Identificador: </strong> {{ $tenant->subscription_id }}
				<li>
					<strong>Ativo: </strong> {{ $tenant->subscription_active == '1' ? 'Sim' : 'Não' }}
				</li>
				<li>
					<strong>Cancelou: </strong> {{ $tenant->subscription_suspended == '1' ? 'Sim' : 'Não' }}
				</li>
				<li>
					<strong>Cadastrado em: </strong> {{ date('d/m/Y', strtotime($tenant->created_at)) }}
				</li>
			</ul>
		</div>
		<div class="card-footer">
			<form action="{{ route('tenants.destroy', $tenant) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Deletar a Empresa {{ $tenant->name }}</button>
				<a class="btn btn-primary" href="{{ route('tenants.index') }}">Voltar</a>
			</form>
		</div>
	</div>
@stop
