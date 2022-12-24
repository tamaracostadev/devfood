@extends('adminlte::page')

@section('title', "Adicionar Empresa")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('tenants.index') }}">Empresas</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('tenants.create') }}">Adicionar Empresa</a></li>
	</ol>
	<h1>Adicionar Empresa</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('tenants.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				@include('admin.pages.tenants.components.form')
			</form>
		</div>
	</div>
@stop
