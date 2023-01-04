<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		
    <!-- Styles -->
    <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
		@yield('styles')
		<style>
			.navbar, footer {
				background-color: #151414 !important;
			}

			.navbar-brand {
				color: #ffffff !important;
			}

			.btn-search {
				background-color: #DA9101 !important;
				border: white;
			}

			.floatingNav {
				border-radius: 2px;
				box-shadow: 0 2px 4px -2px rgba(0,0,0,.2);
			}

			.custom-toggler.navbar-toggler-icon {
				background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,102,203, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
			}

			.custom-toggler.navbar-toggler {
				border-color: rgb(255,102,203);
			}

			.cta-text h4 {
				color: #fff;
				font-size: 20px;
				font-weight: 600;
			}

			.cta-text span {
				color: #757575;
				font-size: 15px;
			}

			@media only screen and (max-width: 767px) {
				.kontak-header, .kontak-desc {
					text-align: left !important;
				}
			}

		</style>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3">
				<div class="container">
					<a class="navbar-brand" href="/">
						<img src="{{ url('/data_file/logo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
						Perpustakaan Daerah Kendari
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<div class="navbar-nav mr-auto ml-auto">
							{{-- <form class="form-inline my-2 my-lg-0" method="get" action="/search">
								<div class="input-group">
									<input type="text" name="search" value="{{ old('search') }}" class="form-control" placeholder="Cari buku apa?" aria-label="Recipient's username" aria-describedby="basic-addon2">
									<div class="input-group-append">
										<button type="submit" class="btn btn-primary btn-search">Cari</button>
									</div>
								</div>
							</form> --}}
						</div>
						<a class="btn btn-login btn-outline-light" href="{{ route('login') }}">Login Admin</a>
						@if (Route::has('register'))
              	<a href="{{ route('register') }}" class="btn btn-outline-dark ml-1">Register</a>
            @endif
					</div>
				</div>
		</nav>
		
    @yield('content')

		<footer>
			<div class="container">
				<div class="row py-4">
					<div class="col-10 col-md-6">
						<div class="cta-text">
								<h4><i class="fas fa-map-marker-alt"></i> Alamat</h4>
								<p class="text-secondary">Jl. Drs. H. Abd. Silondae No.133, <br> Kota Kendari</p>
						</div>
					</div>
					<div class="col-10 col-md-6">
						<div class="cta-text">
								<h4 class="text-right kontak-header"><i class="fas fa-phone"></i> Kontak</h4>
								<p class="text-right text-secondary kontak-desc">(0401) 3122727</p>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<script src="{{ mix('js/app.js') }}"></script>
		<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
		
		<script>
			$(document).ready( function () {
				$(window).scroll(function() {
					if ($(window).scrollTop() > 10) {
							$('.navbar').addClass('floatingNav');
					} else {
							$('.navbar').removeClass('floatingNav');
					}
				});
			});
		</script>
		@yield('scripts')
</body>
</html>

