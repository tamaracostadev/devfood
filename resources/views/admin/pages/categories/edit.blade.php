@extends('adminlte::page')

@section('title', "Editar Categoria {$category->name}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('categories.edit',$category) }}">Editar Categoria</a></li>
	</ol>
	<h1>Editar Categoria {{$category->name}}</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('categories.update',$category) }}" method="POST">
				@csrf
				@method('PUT')
				@include('admin.pages.categories.components.form')
			</form>
		</div>
	</div>
@stop
