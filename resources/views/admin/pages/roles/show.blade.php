@extends('adminlte::page')

@section('title', 'Detalhes do cargo '.$role->name)

@section('content_header')
	<h1>Detalhes do cargo <b>{{ $role->name }}</b></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<ul>
				<li>
					<strong>Nome: </strong> {{ $role->name }}
				</li>
				<li>
					<strong>Descrição: </strong> {{ $role->description }}
				</li>
			</ul>
		</div>
		<div class="card-footer">
			<form action="{{ route('roles.destroy', $role) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Deletar o Cargo {{ $role->name }}</button>
				<a class="btn btn-primary" href="{{ route('roles.index') }}">Voltar</a>
			</form>
		</div>
	</div>
@stop
