<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: #002d47;color: #465765;">
    

    <!-- Aqui va la navbar-->


    <div class="login-clean" style="filter: saturate(100%);background-color: transparent;">
        <form action="{{ route('login') }}" class="border rounded border-white" style="background-color: #c67e06;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="fas fa-tools" style="color: #ffffff;font-size: 70px;"></i></div>
            <div class="form-group border rounded">


                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" style="background-color: #002d47;"><i class="fa fa-user" style="font-size: 20px;color: #ffffff;"></i></span></div>

                    <!--Modificados -->
                    <input id="email" class="border rounded-0 shadow-none form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus style="background-color: #002d47;color: rgb(255,255,255);">        
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                    <div class="input-group-append"></div>
                </div>
{{-- 
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" style="background-color: #002d47;"><i class="fa fa-user" style="font-size: 20px;color: #ffffff;"></i></span></div><input class="border rounded-0 shadow-none form-control" type="text" placeholder="Rut"
                        style="background-color: #002d47;color: rgb(255,255,255);">        
                    <div class="input-group-append"></div>
                </div> --}}


            </div>
            <div class="form-group border rounded">
                <div class="input-group" style="/*border-color: #002d47!important;*/">
                    <div class="input-group-prepend"><span class="input-group-text" style="background-color: #002d47;"><i class="fa fa-lock" style="font-size: 20px;color: #ffffff;"></i></span></div>
                    
                    <input id="password" class="border rounded-0 form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Clave" required autocomplete="current-password" style="background-color: #002d47;color: rgb(255,255,255);">
                          @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror 
                    <div class="input-group-append"></div>

{{--                     
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}


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
            <div class="form-group"><a class="btn btn-primary btn-block" role="button" href="HomeBodega.html" style="background-color: #002d47;">Ingresar</a></div><a class="forgot" href="#" style="color: #ffffff;font-size: 14px;">Recuperar contraseña</a></form>
    </div>
    <footer></footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/smart-forms.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>