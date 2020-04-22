@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
       

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        	<br />
        	<div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
        	<ul class="nav nav-tabs">
        		<li class="nav-item">
        			<a href="#usuario" class="nav-link active" role="tab" data-toggle="tab">Usuario</a>
        		</li>

        		<li class="nav-item">
        			<a href="#profile" class="nav-link" role="tab" data-toggle="tab">Administrador</a>
        		</li>

        		<li class="nav-item">
        			<a href="#about" class="nav-link" role="tab" data-toggle="tab">Bodega</a>
        		</li>

        	</ul>
            </div>
            </div>
        	<div class="tab-content">
        		<div role="tabpanel" class="tab-pane active" id="usuario"> 
                
                <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                </div>
        		<div role="tabpanel" class="tab-pane fade" id="profile">Login administrador</div>
        		<div role="tabpanel" class="tab-pane fade" id="about">Login bodega</div>
        	</div>
        </div>


       




@endsection
