@extends('layouts.app1')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-11 col-md-8 col-lg-6">
                    <div  style="font-size: 22px;margin-bottom:1.5rem;">
                        <a class="navbar-brand weed"
                        href="{{ route('home') }}"><b>S</b><b>w</b><b>ee</b><b>t</b><b>d</b>Home<span><b>4</b><b>:</b><b>2</b><b>0</b></span></a>
                       </div>
                
                    
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/login" class="d-grid gap-2" novalidate>
                            @csrf
                            <div>
                                <label for="username" class="form-label">{{ __('E-Mail / Username') }}</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror {{old('username') ?  'is-valid' : '' }}" id="username"
                                    name="username" value="{{ old('username') }}" required 
                                    autofocus>
                                @error('username')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror {{old('password') ?  'is-valid' : '' }}"
                                    id="password" name="password" value="{{ old('password') }}" required autofocus>
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div class="login-forgot">
                                <button type="submit" class="btn btn-primary px-5">{{ __('Login') }}</button>
                                @if (!Route::is('alien.*'))
                                    @if (Route::has('password.request'))
                                        <a class="link-info" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                @else
                                    @if (Route::has('alien.password.request'))
                                        <a class="link-info" href="{{ route('alien.password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
