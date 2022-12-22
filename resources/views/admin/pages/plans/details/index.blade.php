@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')

	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
		<li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
		<li class="breadcrumb-item active">Detalhes</li>
	</ol>

	<h1>Detalhes do plano <b>{{ $plan->name }}</b></h1>

@stop

@section('content')
	<div class="card">
		<div class="card-header">
			<a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark">Adicionar detalhe</a>
		</div>
		<div class="card-body">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Name</th>
						<th style="width:300px;">Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($details as $detail)
						<tr>
							<td>{{ $detail->name }}</td>
							<td style="width:300px;gap:10px" class="d-flex">
								<a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-info">Editar</a>
								<form action="{{ route('details.plan.destroy', [$plan->url, $detail->id])  }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger">Excluir</button>

								</form>

							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop
