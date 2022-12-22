@extends('adminlte::page')

@section('title', 'Editar o Plano {{ $plan->name }}')

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('plans.edit', $plan->url) }}">Editar</a></li>
	</ol>
	<h1>Editar o Plano {{ $plan->name }}</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('plans.update', $plan->url) }}" method="POST">
				@method('PUT')
				@csrf
				@include('admin.pages.plans.components.form')
			</form>
		</div>
	</div>
@stop



