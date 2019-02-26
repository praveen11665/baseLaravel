@extends('layouts.auth_layout')
@section('content')
    <style type="text/css">
        .errorStyle{
          color: red;
          font-size: 16px;
          float: center;
          text-align: center;    
        }
    </style>
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    @if ($errors->any())
                        <!-- <div class="alert alert-danger" id="lblError">
                          <span class="text">{{ $errors->first() }}</span>
                        </div> -->
                        <div class="toast show animated fadeInRight shadow-lg border-danger fade" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-body errorStyle">{{ $errors->first() }}</div></div>
                    @endif

                    <div class="login-control-group">
                        <label>{{ __('Name') }}</label>
                        <input id="name" type="text" class="login-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>                        
                    </div>                    

                    <div class="login-control-group">
                        <label>{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="login-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    </div> 

                    <div class="login-control-group">
                        <label>{{ __('Password') }}</label>
                        <input id="password" type="password" class="login-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required onkeyup="CheckPasswordStrength(this.value)">
                        <br>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <span id="password_strength"></span>
                    </div> 

                    <div class="login-control-group">
                        <label>{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="login-control" name="password_confirmation" required>
                    </div> 

                    <div class="login-control-group text-center">
                        <button type="submit" class="btn btn-block btn-outline-info">{{ __('Register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--PASSWORD STRENGTH-->
    <script type="text/javascript">
        function CheckPasswordStrength(password) {
        var password_strength = document.getElementById("password_strength");
 
        //TextBox left blank.
        if (password.length == 0) {
            password_strength.innerHTML = "";
            $('.progress-bar').css('width', '0%'); 
            return;
        }
 
        //Regular Expressions.
        var regex = new Array();
        regex.push("[A-Z]"); //Uppercase Alphabet.
        regex.push("[a-z]"); //Lowercase Alphabet.
        regex.push("[0-9]"); //Digit.
        regex.push("[$@$!%*#?&]"); //Special Character.
 
        var passed = 0;
 
        //Validate for each Regular Expression.
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test(password)) {
                passed++;
            }
        }
 
        //Validate for length of Password.
        if (passed > 2 && password.length > 8) {
            passed++;
        }
 
        //Display status.
        var color    = "";
        var strength = "";        
        var progressWidth    = "0%"; 
        switch (passed) {
            case 0:
            case 1:
                strength = "Weak";
                color    = "red";
                progressWidth    = "20%";
                break;
            case 2:
                strength = "Good";
                color    = "darkorange";
                progressWidth    = "50%";
                break;
            case 3:
            case 4:
                strength = "Strong";
                color    = "green";
                progressWidth    = "80%";
                break;
            case 5:
                strength = "Very Strong";
                color    = "darkgreen";
                progressWidth    = "100%";
                break;
            default:
                progressWidth    = "0%";
        }

        password_strength.innerHTML   = strength;
        password_strength.style.color = color; 

        //Progress Bar
        $('.progress-bar').css('background-color', color);      
        $('.progress-bar').css('width', progressWidth);      
    }
    </script>
@endsection
