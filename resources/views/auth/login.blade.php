@extends('layouts.success')

@section('content')

<div class="login-container">
    <div class="container">
        <div class="row page-login d-flex align-items-center" style="margin-bottom: 5%">
            <div class="section-left col-12 col-md-6">
                <h1 class="mb-4">We explore the new <br/> much better</h1>
                <img src="{{ url('frontend/images/login.png') }}"
                alt=""
                class="w-75 d-none d-sm-flex">
            </div>
            <div class="section-right col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ url('frontend/images/logo_nomads.png') }}" alt="" class="w-50 mb-4">
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                {{-- <label for="exampleInputEmail">Email address</label> --}}
                                <label for="email">{{ __('Email Address') }}</label>
                                {{-- <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"> --}}

                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                {{-- <label for="exampleInputPassword">Password</label> --}}
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <input type="password" class="form-control" id="exampleInputPassword"> --}}
                            </div>
                            {{-- <button type="submit" class="btn btn-login btn-block">Submit</button>
                            <button type="submit" class="btn btn-login btn-block">Register</button> --}}
                                <button type="submit" class="btn btn-login btn-block">
                                    {{ __('Login') }}
                                </button>

                                <button class="btn btn-login btn-block" type="button"
                                onclick="event.preventDefault(); location.href='{{ route('register') }}';">
                                Register
                                </button>

                            <p class="text-center mt-4">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <button class="btn btn-login my-2 my-sm-0" type="button"
                                onclick="event.preventDefault(); location.href='{{ route('register') }}';">
                                Register
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
</div> --}}
@endsection
