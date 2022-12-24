@extends('adminlte::page')

@section('title', "Editar Mesa {$table->identify}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('tables.index') }}">Mesas</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('tables.edit',$table) }}">Editar Mesa</a></li>
	</ol>
	<h1>Editar Mesa {{$table->identify}}</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('tables.update',$table) }}" method="POST">
				@csrf
				@method('PUT')
				@include('admin.pages.tables.components.form')
			</form>
		</div>
	</div>
@stop
