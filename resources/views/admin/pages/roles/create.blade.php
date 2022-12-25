@extends('adminlte::page')

@section('title', "Adicionar Cargo")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Papéis</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('roles.create') }}">Adicionar Cargo</a></li>
	</ol>
	<h1>Adicionar Cargo</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('roles.store') }}" method="POST">
				@csrf
				@include('admin.pages.roles.components.form')
			</form>
		</div>
	</div>
@stop
