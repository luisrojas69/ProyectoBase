@extends('layouts.master-login')

@section('title-page', 'Login')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>{{ config('app.name') }}</b></a>
  </div>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>
    @include('layouts.messages.flash-message')
    <form action="{{ route('login') }}" method="post">
    @csrf 
      <div class="form-group has-feedback @error('email') has-error @enderror">
        
        <input 
          id="email" 
          type="email" 
          class="form-control" 
          name="email"
          placeholder="Introduce tu email" 
          value="{{ old('email') }}" 
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
          placeholder="Introduce tu password"
          autocomplete="current-password">

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @error('password')
            <span class="help-block" role="alert">
                {{ $message }}
            </span>
        @enderror
 
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
            </label>
          </div>
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



    <a href="{{ route('password.request') }}">Olvidé mi password</a><br>
    <a href="{{ route('register') }}" class="text-center">Registrarse</a>

  </div>
  <!-- /.login-box-body -->
</div>
@endsection
