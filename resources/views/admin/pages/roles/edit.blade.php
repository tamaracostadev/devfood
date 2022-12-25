@extends('adminlte::page')

@section('title', "Editar Cargo")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('roles.edit',$role) }}">Editar Cargo</a></li>
	</ol>
	<h1>Editar Cargo</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('roles.update',$role) }}" method="POST">
				@csrf
				@method('PUT')
				@include('admin.pages.roles.components.form')
			</form>
		</div>
	</div>
@stop
