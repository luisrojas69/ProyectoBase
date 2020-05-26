@extends('layouts.master-login')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>{{ config('app.name') }}</b></a>
  </div>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password</p>
    @include('layouts.messages.flash-message')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <form action="{{ route('password.email') }}" method="post">
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

      <div class="row">
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar link de Reset</button>
        </div>
      </div>

    </form>

  </div>
  <!-- /.login-box-body -->
</div>


@endsection
