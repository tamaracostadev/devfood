@extends('adminlte::page')

@section('title', 'Adicionar Usuários')

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('users.create') }}">Adicionar Usuário</a></li>
	</ol>
	<h1>Adicionar Usuários</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('users.store') }}" method="post">
				{!! csrf_field() !!}
				@include('admin.pages.users.components.form')
			</form>
		</div>
	</div>
@stop
