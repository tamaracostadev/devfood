@extends('adminlte::page')

@section('title', 'Detalhes do perfil '.$profile->name)

@section('content_header')
	<h1>Detalhes do perfil <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<ul>
				<li>
					<strong>Nome: </strong> {{ $profile->name }}
				</li>
				<li>
					<strong>Descrição: </strong> {{ $profile->description }}
				</li>
			</ul>
		</div>
		<div class="card-footer">
			<form action="{{ route('profiles.destroy', $profile) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Deletar o Perfil {{ $profile->name }}</button>
				<a class="btn btn-primary" href="{{ route('profiles.index') }}">Voltar</a>
			</form>
		</div>
	</div>
@stop
