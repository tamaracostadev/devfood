@extends('adminlte::page')

@section('title', 'Detalhes da Mesa '.$table->identify)

@section('content_header')
	<h1>Detalhes da Mesa <b>{{ $table->identify }}</b></h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<ul>
				<li>
					<strong>Identificador: </strong> {{ $table->identify }}
				</li>
				<li>
					<strong>Status: </strong> {{ $table->status == 'available' ? 'Disponível' : 'Indisponível' }}
				</li>
				<li>
					<strong>Descrição: </strong> {{ $table->description }}
				</li>
			</ul>
		</div>
		<div class="card-footer">
			<form action="{{ route('tables.destroy', $table) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Deletar a Mesa {{ $table->identify }}</button>
				<a class="btn btn-primary" href="{{ route('tables.index') }}">Voltar</a>
			</form>
		</div>
	</div>
@stop
