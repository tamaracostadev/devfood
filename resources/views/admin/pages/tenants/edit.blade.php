@extends('adminlte::page')

@section('title', "Editar Empresa {$tenant->name}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('tenants.index') }}">Empresas</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('tenants.edit',$tenant) }}">Editar Empresa</a></li>
	</ol>
	<h1>Editar Empresa {{$tenant->name}}</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('tenants.update',$tenant) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				@include('admin.pages.tenants.components.form')
			</form>
		</div>
	</div>
@stop
