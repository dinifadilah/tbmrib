@extends('layouts.app')

@section('styles')
<style>
	.card {
		opacity: 85%;
	}

	.btn-login {
		background-color: #DA9101 !important;
		border: white;
	}
</style>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card">
								<div class="card-header">Login Admin</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

														<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

														@error('email')
																<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																</span>
														@enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

														<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

														@error('password')
																<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																</span>
														@enderror
                        </div>

                        <!-- <div class="form-group">
														<div class="form-check">
																<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

																<label class="form-check-label" for="remember">
																		{{ __('Remember Me') }}
																</label>
														</div>
                        </div> -->

                        <div class="form-group mb-0">
														<button type="submit" class="btn btn-primary btn-login">
																{{ __('Login') }}
														</button>

														<a href="/" class="btn btn-secondary">Batal</a>
                        </div>

												@if (Route::has('password.request'))
														<a class="btn btn-link pl-0" href="{{ route('password.request') }}">
																{{ __('Lupa Password?') }}
														</a>
												@endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
