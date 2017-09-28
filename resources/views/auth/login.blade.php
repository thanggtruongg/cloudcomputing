@extends('layouts.default')
@section('body')
<?php
    $page_title="Login";
?>
<div class="loginform">
<h1>Login</h1>

<!-- https://laravel.com/docs/5.1/authentication -->

<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        <label for='email'>Email: </label>
        <input type="email" class='form-control' name="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div>
        <label for='password'>Password: </label>
        <input type="password" class='form-control' name="password" id="password">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit" class='btn btn-primary btn-lg'>Login</button>
    </div>
</form>
</div>
    <div class="fb-btn">
          <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="true"></div>
    </div>

@endsection