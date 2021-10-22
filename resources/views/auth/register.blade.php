@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center " >
        <div class="col-sm-4 position-relative weed-bg" >
            <div class="position-absolute top-50 start-50 translate-middle weed-content" >
                Hello Weed.
              </div>  
          </div>      
          <div class="col-sm-7 col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('register') }}" class="d-grid gap-2 needs-validation" novalidate>
                        @csrf
                        <div class="row ">
                            <label for="username" class="col-lg-4 col-form-label  text-lg-end">{{ __('Username') }}</label>
                            <div class="col-lg-8">
                            <input type="text" class="form-control @error('username') is-invalid @enderror {{old('username') ?  'is-valid' : '' }}" id="username"
                                name="username" value="{{ old('username') }}" required
                                autofocus>
                                @error('username')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                            
                        </div>
                        <div class="row ">
                            <label for="fname" class="col-lg-4 col-form-label text-lg-end">{{ __('FirstName') }}</label>
                            <div class="col-lg-8">
                            <input type="text" class="form-control @error('fname') is-invalid @enderror {{old('fname') ?  'is-valid' : '' }}" id="fname"
                                name="fname" value="{{ old('fname') }}" required 
                                autofocus>
                                @error('fname')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                            
                        </div>
                        <div class="row ">
                            <label for="mname" class="col-lg-4 col-form-label text-lg-end">{{ __('Middlename') }}</label>
                            <div class="col-lg-8">
                            <input type="text" class="form-control @error('mname') is-invalid @enderror {{old('mname') ?  'is-valid' : '' }}" id="mname"
                                name="mname" value="{{ old('mname') }}" required 
                                autofocus>
                                @error('mname')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                            
                        </div>
                        <div class="row ">
                            <label for="lname" class="col-lg-4 col-form-label text-lg-end">{{ __('Lastname') }}</label>
                            <div class="col-lg-8">
                            <input type="text" class="form-control @error('lname') is-invalid @enderror {{old('lname') ?  'is-valid' : '' }}" id="lname"
                                name="lname" value="{{ old('lname') }}" required 
                                autofocus>
                                @error('lname')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                            
                        </div>
                        <div class="row ">
                            <label for="email" class="col-lg-4 col-form-label text-lg-end">{{ __('Email') }}</label>
                            <div class="col-lg-8">
                            <input type="email" class="form-control @error('email') is-invalid @enderror {{old('email') ?  'is-valid' : '' }}" id="email"
                                name="email" value="{{ old('email') }}" required 
                                autofocus>
                                @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                            
                        </div>

                        <div class="row ">
                            <label for="password" class="col-lg-4 col-form-label text-lg-end">{{ __('Password') }}</label>
                            <div class="col-lg-8">
                            <input type="password" class="form-control @error('password') is-invalid @enderror {{old('password') ?  'is-valid' : '' }}" id="password"
                                name="password" value="{{ old('password') }}" required 
                                autofocus>
                                @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                        </div>

                        <div class="row ">
                            <label for="password_confirmation" class="col-lg-4 col-form-label text-lg-end">{{ __('Confirm Password') }}</label>
                            <div class="col-lg-8">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror {{old('password_confirmation') ?  'is-valid' : '' }}" id="password_confirmation"
                                name="password_confirmation" value="{{ old('password_confirmation') }}" required 
                                autofocus>
                                @error('password_confirmation')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-primary px-5">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>    
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="name" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="name" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
