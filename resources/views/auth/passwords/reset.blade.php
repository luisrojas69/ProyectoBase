
@extends('layouts.master-login')

@section('title-page', 'Reset Password')

@section('content')


<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>{{ config('app.name') }}</b></a>
  </div>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password</p>
    @include('layouts.messages.flash-message')
    
   <form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group has-feedback @error('email') has-error @enderror">
        
        <input 
          id="email" 
          type="email" 
          class="form-control" 
          name="email"
          placeholder="Introduce tu email" 
          value="{{ $email ?? old('email') }}"
          required 
          autocomplete="email" 
          autofocus>

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @error('email')
              <span class="help-block" role="alert">
                  {{ $message }}
              </span>
        @enderror

      </div>

      <div class="form-group has-feedback @error('password') has-error @enderror">
        <input 
          id="password" 
          type="password" 
          class="form-control" 
          name="password"
          placeholder="Introduce tu nuevo password"
          autocomplete="new-password">

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @error('password')
            <span class="help-block" role="alert">
                {{ $message }}
            </span>
        @enderror
 
      </div>

      <div class="form-group has-feedback">
        <input
          for="password-confirm" 
          id="password-confirm" 
          type="password" 
          class="form-control" 
          name="password_confirmation"
          placeholder="Confirmar password"
          autocomplete="new-password">

        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
 
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>

@endsection