@extends('adminlte::page')

@section('title', 'Detalhes do Produto '.$product->title)

@section('content_header')
	<h1>Detalhes do Produto <b>{{ $product->title }}</b></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<img class="img-thumbnail text-align-center w-25" src="{{asset("/storage/{$product->image}")}}"
				 alt="{{$product->title}}">
			<ul>
				<li>
					<strong>Título: </strong> {{ $product->title }}
				</li>
				<li>
					<strong>Flag: </strong> {{ $product->flag }}
				</li>
				<li>
					<strong>Descrição: </strong> {{ $product->description }}
				</li>
			</ul>
		</div>
		<div class="card-footer">
			<form action="{{ route('products.destroy', $product) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Deletar o Produto {{ $product->title }}</button>
				<a class="btn btn-primary" href="{{ route('products.index') }}">Voltar</a>
			</form>
		</div>
	</div>
@stop
