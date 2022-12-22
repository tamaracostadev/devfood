@extends('adminlte::page')

@section('title', "Adicionar Perfil")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('profiles.create') }}">Adicionar Perfil</a></li>
	</ol>
	<h1>Adicionar Perfil</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('profiles.store') }}" method="POST">
				@csrf
				@include('admin.pages.profiles.components.form')
			</form>
		</div>
	</div>
@stop
