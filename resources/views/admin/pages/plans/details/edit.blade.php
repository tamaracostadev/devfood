@extends('adminlte::page')

@section('title', "Editar detalhe do plano {$plan->name}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
		<li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
		<li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
		<li class="breadcrumb-item active"><a href="{{route('details.plan.create',$plan->url)}}">Adicionar Detalhe</a> </li>
	</ol>
	<h1>Editar detalhe do plano {{$plan->name}}</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark">Adicionar detalhe</a>
		</div>
		<div class="card-body">
			<form action="{{ route('details.plan.update', [$plan->url,$detail->id]) }}" method="POST">
				@method('PUT')
				@csrf
				@include('admin.pages.plans.details.components.form')
			</form>
		</div>
	</div>
@stop
