@extends('layout.master2')

@section('content')

<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper" style="background-image: url({{asset('assets/images/login_bg.png')}})">

            </div>
          </div>
          <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">PLT<span>HR System</span></a>
              <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
              @include('layout.alert')
              <form action="{{route('authenticate')}}" class="forms-sample" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email</label>
                  <input type="email" name="email" required class="form-control" id="userEmail" placeholder="Enter your email here...">
                  @error('email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror 
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Password</label>
                  <input type="password" name="password" required class="form-control" id="userPassword" autocomplete="current-password" placeholder="Enter your password here...">
                  @error('password')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror 
                </div>
                {{-- <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Remember me
                  </label>
                </div> --}}
                <div>
                  <div class="d-flex justify-content-center">

                    <button class="btn btn-primary w-100">Login</button>
                  </div>
                  {{-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="twitter"></i>
                    Login with twitter
                  </button> --}}
                </div>
                {{-- <a href="{{ url('/auth/register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a> --}}
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection