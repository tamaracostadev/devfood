@extends('adminlte::page')

@section('title', "Detalhes da Permissão {$permission->name}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
	</ol>
	<h1>Detalhes da Permissão {{$permission->name}}</h1>
@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<ul>
				<li>
					<strong>Nome: </strong> {{ $permission->name }}
				</li>
				<li>
					<strong>Descrição: </strong> {{ $permission->description }}
				</li>
			</ul>
			@include('components.alerts')
			<form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Deletar a Permissão {{ $permission->name }}</button>
			</form>
		</div>
	</div>
@stop
