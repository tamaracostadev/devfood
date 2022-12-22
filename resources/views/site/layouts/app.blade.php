<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

	<!-- Scripts -->
	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<!-- Scripts -->

	<script src="{{ asset('js/app.js') }}" defer></script>
	<link rel="stylesheet" href="{{ asset('css/site.css') }}">

	{{--Tailwind--}}

	{{--Bootstrap--}}
	<link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" rel="stylesheet">
	{{--Font Awesome--}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
		  integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
		  crossorigin="anonymous"/>

	{{--Google Fonts--}}
</head>
<body>
<div class="main">
	{{--navbar--}}
	<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
		<div class="container-fluid d-inline-flex justify-content-between">
			<a class="navbar-brand" href="{{route('site.home')}}">LaraFood</a>
			<button class="navbar-toggler" data-target="#navbarNav" data-toggle="collapse" type="button">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="justify-content-end navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="{{route('site.home')}}">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('site.contato')}}">Contato</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('site.sobre')}}">Sobre</a>
					</li>
					@if(auth()->check())
						<li class="nav-item">
							<a class="nav-link" href="{{route('admin.index')}}">Painel</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('logout')}}">Sair</a>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link" href="{{route('login')}}">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('register')}}">Registre-se</a>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	{{--navbar--}}
	{{--content--}}
	<main class="container">
		@yield('content')
	</main>
	{{--content--}}
	{{--footer--}}
	<footer class="bg-danger text-center text-lg-start">
		<!-- Section: Social media -->
		<section
			class="d-flex justify-content-center p-2 border-bottom text-white"
		>
			<!-- Left -->
			<div class="px-2 d-none d-lg-block ">
				<span>Nossas Redes Sociais:</span>
			</div>
			<!-- Left -->
			<!-- Right -->
			<div>
				<a href="" class="pl-1 text-reset">
					<i class="fab fa-facebook-f"></i>
				</a>
				<a href="" class="pl-1 text-reset">
					<i class="fab fa-twitter"></i>
				</a>
				<a href="" class="pl-1 text-reset">
					<i class="fab fa-google"></i>
				</a>
				<a href="" class="pl-1 text-reset">
					<i class="fab fa-instagram"></i>
				</a>
				<a href="" class="pl-1 text-reset">
					<i class="fab fa-linkedin"></i>
				</a>
				<a href="" class="pl-1 text-reset">
					<i class="fab fa-github"></i>
				</a>
			</div>
			<!-- Right -->
		</section>
		<!-- Section: Social media -->

	</footer>
</div>
<!-- Footer -->
{{--scripts--}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
		crossorigin="anonymous"></script>
{{--bootstrap--}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
		integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
		crossorigin="anonymous"></script>
{{--fontawesome--}}
<script src="https://kit.fontawesome.com/7b6b9b6b9f.js" crossorigin="anonymous"></script>

</body>
</html>
