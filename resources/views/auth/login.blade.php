@extends('layouts.auth_layout')
@section('content')
  <div id="loginSlider" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <form method="POST" action="{{ route('login') }}">
          @csrf               
          @if ($errors->any())
            <!-- <div class="alert alert-danger" id="lblError">
              <span class="text">Incorrect email or password</span>
            </div> -->
            <div class="toast show animated fadeInRight shadow-lg border-danger fade" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-body errorStyle">Incorrect email or password</div></div>
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
          <div class="login-control-group text-center">
            <button type="submit" class="btn btn-outline-info" id="btnLogin" style="width: 100px;">Login</button>
            <!--<a class="login-forgot-link float-right" href="#">Help</a>-->
          </div>
          <div class="text-center section-or">
            <span>OR</span>
          </div>

          <div class="social-media">
              <a href="{!! url('auth/facebook') !!}"><i class="fab fa-facebook-f"></i></a>
              <a href="{!! url('auth/google') !!}"><i class="fab fa-google"></i></a>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection