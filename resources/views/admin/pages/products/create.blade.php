@extends('adminlte::page')

@section('title', "Adicionar Produto")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('products.create') }}">Adicionar Produto</a></li>
	</ol>
	<h1>Adicionar Produto</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				@include('admin.pages.products.components.form')
			</form>
		</div>
	</div>
@stop
