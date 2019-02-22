@extends('layouts.auth_layout')
@section('content')
  <div id="loginSlider" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <form method="POST" action="{{ route('login') }}">
          @csrf               
          @if ($errors->any())
            <div class="alert alert-danger" id="lblError">
              <span class="text">Incorrect email or password</span>
            </div>
          @endif
          <!-- Login Panel -->
          <div class="login-control-group">
            <label>Email</label>
            <input id="email" type="email" class="login-control" name="email" value="{{ old('email') }}" />
            <span id="validEmail"></span>
          </div>

          <div class="login-control-group">
            <label>Password</label>
            <input id="password" type="password" name="password" class="login-control" />
            <!--<a class="login-forgot-link" href="#">Forgot Password?</a>-->
          </div>
          <div class="login-control-group">
            <button type="submit" class="btn btn-block btn-outline-primary" id="btnLogin">Login</button>
            <!--<a class="login-forgot-link float-right" href="#">Help</a>-->
          </div>
          <div class="text-center section-or">
            <span>
              OR
            </span>
          </div>

          <div style="margin-left:-25px;margin-right:-25px;" class="py-3 text-center">
            <button class="btn btn-light rounded mb-1 shadow-sm" title="Coming Soon" style="cursor: not-allowed;" onclick="return false">
              <img src="{{ asset('/img/btn_google_light_normal_ios.svg') }}" /> Sign in with Google
            </button>
          </div>
        </form>
      </div>

      <div class="carousel-item">
        <div class="slide-spinner" style="height:350px;">
          <span></span>
          <div class="text-center">Please wait while we log you in</div>
        </div>
      </div>
    </div>
  </div> 
@endsection