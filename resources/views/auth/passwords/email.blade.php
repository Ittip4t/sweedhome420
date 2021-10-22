@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="d-grid gap-2"  novalidate>
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

                        <button type="submit" class="btn btn-primary col-12 col-md-6">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
