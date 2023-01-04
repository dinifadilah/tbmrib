@extends('adminlte::page')

@yield('title')

<div id="app">
	@section('content')
			@yield('content_header')
	@stop
</div>

@section('css')
		<!-- <link href=" {{ asset('css/app.css') }}" rel="stylesheet"> -->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
		
@stop

@section('js')
	<!-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	@yield('scripts')
@stop