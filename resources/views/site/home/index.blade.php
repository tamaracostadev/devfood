@extends('site.layouts.app')


@section('content')
	{{--Planos--}}
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Planos</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card-deck">
					@foreach($plans as $plan)
						<div class="card bg-light">
							<div class="p-2 card-title bg-danger text-white">
								<h5 class="text-center">{{$plan->name}}</h5>
							</div>
							<div class="card-body">
								<ul>
									@foreach($plan->details as $detail)
										<li><i class="fas fa-check-circle text-green-600 px-2"></i>{{$detail->name}}</li>
									@endforeach
								</ul>

								<div class="inline-flex align-items-baseline px-2">
									<h4 class="p-0">R$ {{number_format($plan->price,2,',','.')}}</h4>
									<p class="p-1">Por Mês</p>
								</div>
								<a href="{{ route('plan.subscription',$plan->url) }}" class="btn btn-danger w-full">Assinar</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection
