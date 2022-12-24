@extends('adminlte::page')

@section('title', "Adicionar Mesa")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('tables.index') }}">Mesas</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('tables.create') }}">Adicionar Mesa</a></li>
	</ol>
	<h1>Adicionar Mesa</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('tables.store') }}" method="POST">
				@csrf
				@include('admin.pages.tables.components.form')
			</form>
		</div>
	</div>
@stop
