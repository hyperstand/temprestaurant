
@extends('layouts.app')

@section('content')
{{-- <div class="auth Loginbody" ng-controller="loginController">
    <div class="header">
            <img src="img/logo.png" alt="" title="" />
            <h3>Login</h3>
            <p >User or Password incorect</p>
    </div>
    <form>
            <div class="mt-20">
                    <input type="email" name="EMAIL" 
                    placeholder="Email address" class="single-input" ng-model="EmailModel">
                    <p class="notify" ng-hide="error_stat.email == false">
                       <span class="error">Email Required</span> 
                    </p>
            </div>
            <div class="mt-20">
                            <input type="password" name="password" 
                            placeholder="Password" 
                            class="single-input" ng-model="PasswordModel">
                            <p class="notify" ng-hide="error_stat.password == false">
                               <span class="error">Password Required</span> 
                            </p>
            </div>

            <div class="mt-20">
                    <a href="" class="genric-btn primary" ng-click="Login()">Login</a>
            </div>
            <div class="footer">
                    <a class="retrive">Forget Password</a>
            </div>
    </form>

    <div class="footer-2">
            <p>Don't Have An Account Sign Up <a href="{{ route('password.request') }}">Here</a></p>
    </div>
</div>  --}}


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
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
@endsection