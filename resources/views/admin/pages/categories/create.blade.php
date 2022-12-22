@extends('adminlte::page')

@section('title', "Adicionar Categoria")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('categories.create') }}">Adicionar Categoria</a></li>
	</ol>
	<h1>Adicionar Categoria</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('categories.store') }}" method="POST">
				@csrf
				@include('admin.pages.categories.components.form')
			</form>
		</div>
	</div>
@stop
