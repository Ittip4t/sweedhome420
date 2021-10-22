@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" class="d-grid gap-2" novalidate>
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

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

                        <div>
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror {{old('password_confirmation') ?  'is-valid' : '' }}"
                                id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus>
                                @error('password_confirmation')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
