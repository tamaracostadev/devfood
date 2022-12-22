@extends('adminlte::page')

@section('title', 'Detalhes da Categoria '.$category->name)

@section('content_header')
	<h1>Detalhes da Categoria <b>{{ $category->name }}</b></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<ul>
				<li>
					<strong>Nome: </strong> {{ $category->name }}
				</li>
				<li>
					<strong>Url: </strong> {{ $category->url }}
				</li>
				<li>
					<strong>Descrição: </strong> {{ $category->description }}
				</li>
			</ul>
		</div>
		<div class="card-footer">
			<form action="{{ route('categories.destroy', $category) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Deletar a Categoria {{ $category->name }}</button>
				<a class="btn btn-primary" href="{{ route('categories.index') }}">Voltar</a>
			</form>
		</div>
	</div>
@stop
