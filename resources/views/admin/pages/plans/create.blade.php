@extends('adminlte::page')

@section('title', 'Novo Plano')

@section('content_header')
	<h1>Cadastrar novo Plano</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('plans.store') }}" method="POST">
				@csrf
				@include('admin.pages.plans.components.form')
			</form>
		</div>
	</div>
@stop
