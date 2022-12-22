@extends('adminlte::page')

@section('title', 'Adicionar Permissões')

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
	</ol>
	<h1>Adicionar Permissões</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('permissions.store') }}" method="POST">
				@csrf
				@include('admin.pages.permissions.components.form')
			</form>
		</div>
	</div>
@stop


