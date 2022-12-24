@extends('adminlte::page')

@section('title', "Editar Produto {$product->title}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('products.edit',$product) }}">Editar Produto</a></li>
	</ol>
	<h1>Editar Produto {{$product->title}}</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				@include('admin.pages.products.components.form')
			</form>
		</div>
	</div>
@stop
