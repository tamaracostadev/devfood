@extends('adminlte::page')

@section('title', "Editar Usuário {$user->name}")

@section('content_header')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
		<li class="breadcrumb-item active"><a href="{{ route('users.edit',$user->id) }}">Editar Usuário</a></li>
	</ol>
	<h1>Editar Usuário {{$user->name}}</h1>

@stop

@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('users.update', $user->id) }}" method="post">
				{!! csrf_field() !!}
				{!! method_field('PUT') !!}
				@include('admin.pages.users.components.form')
			</form>
		</div>
	</div>
@stop
