@php
    $layout = !Route::is('alien.*') ? 'layouts.app1' : 'layouts.admin';
@endphp
@extends($layout)


@section('content')
    <div class="container" >
        <h1 class="mt-4">{{$user->username}}'s Profile</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Profile Setting</li>
        </ol>
        <div class="row ">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Profile') }}</div>

                    @if (session('status') === 'profile-information-updated')
                        <div class="alert alert-success" role="alert">
                            Users information updated
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('user-profile-information.update') }}" class="d-grid gap-2 needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row ">
                                <label for="username" class="col-lg-4 col-form-label  text-lg-end">{{ __('Username') }}</label>
                                <div class="col-lg-8">
                                <input type="text" class="form-control @error('username') is-invalid @enderror {{old('username') ?  'is-valid' : '' }}" id="username"
                                    name="username" value="{{ old('username') ?? $user->username }}" required
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
                                    name="fname" value="{{ old('fname') ?? $user->fname }}" required 
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
                                    name="mname" value="{{ old('mname') ?? $user->mname}}" required 
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
                                    name="lname" value="{{ old('lname') ?? $user->lname }}" required 
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
                                    name="email" value="{{old('email') ?? $user->email }}" required 
                                    autofocus>
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6 offset-lg-4">
                                    <button type="submit" class="btn btn-primary px-5">
                                        {{ __('update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Update Password') }}</div>
                    
                    @if (session('status') === 'password-updated')
                        <div class="alert alert-success" role="alert">
                            Password updated
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('user-password.update') }}" class="d-grid gap-2 needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row ">
                                <label for="current_password" class="col-lg-4 col-form-label text-lg-end">{{ __('Current Password') }}</label>
                                <div class="col-lg-8">
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror {{old('current_password') ?  'is-valid' : '' }}" id="current_password"
                                    name="current_password" value="{{ old('current_password') }}" required 
                                    autofocus>
                                    @error('current_password')
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
                                <label for="password_confirmation" class="col-lg-4 col-form-label text-lg-end">{{ __('Confirm New Password') }}</label>
                                <div class="col-lg-8">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror {{old('password_confirmation') ?  'is-valid' : '' }}" id="password_confirmation"
                                    name="password_confirmation"  required 
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
                                        {{ __('update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card  mb-4 ">
                    <div class="card-header">{{ __("Assign User's Roles") }}</div>
                    
                    @if (session('status') === 'password-updated')
                        <div class="alert alert-success" role="alert">
                            User's Roles updated
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <b>super-admin</b>
                            </div>
                            <div class="col-md-9">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">user's policy</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">role's policy</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">permission's policy</button>
                                    </li>
                                  </ul>
                                  <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="d-flex flex-wrap ">
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  create-user
                                                </label>
                                              </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  update-user
                                                </label>
                                              </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  delete-user
                                                </label>
                                              </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  view-user
                                                </label>
                                              </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  view-user
                                                </label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                                  </div>
                                {{-- <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    user's policy
                                  </button>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    role's policy
                                  </button>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    permission's policy
                                  </button>
                                  <div class="collapse show" id="collapseExample">
                                    <div class="card card-body ">
                                        <div class="d-flex flex-wrap ">
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  create-user
                                                </label>
                                              </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  update-user
                                                </label>
                                              </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  delete-user
                                                </label>
                                              </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  view-user
                                                </label>
                                              </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  view-user
                                                </label>
                                              </div>
                                        </div>
                                        
                                    </div>
                                  </div> --}}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
