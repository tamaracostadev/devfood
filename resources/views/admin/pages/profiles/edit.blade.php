@extends('adminlte::page')

@section('title', "Editar Perfil")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('profiles.edit',$profile) }}">Editar Perfil</a></li>
	</ol>
	<h1>Editar Perfil</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('profiles.update',$profile) }}" method="POST">
				@csrf
				@method('PUT')
				@include('admin.pages.profiles.components.form')
			</form>
		</div>
	</div>
@stop
