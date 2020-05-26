@extends('layouts.master-login')

@section('title-page', 'Registro')

@section('content')

<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>{{ config('app.name') }}</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Introduce tu datos</p>

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-group has-feedback @error('name') has-error @enderror">
        <input 
            type="text" 
            class="form-control" 
            placeholder="Nombre Completo" 
            name="name" 
            value="{{ old('email') }}" 
            required 
            autocomplete="email">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        
        @error('name')
            <span class="help-block" role="alert">
                {{ $message }}
            </span>
        @enderror
      </div>

      <div class="form-group has-feedback @error('email') has-error @enderror">
        <input 
            type="email" 
            class="form-control" 
            placeholder="Email" 
            name="email" 
            value="{{ old('email') }}" 
            required 
            autocomplete="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        
        @error('email')
            <span class="help-block" role="alert">
                {{ $message }}
            </span>
        @enderror
      </div>
      

      <div class="form-group has-feedback @error('password') has-error @enderror">
        <input 
            type="password" 
            class="form-control" 
            placeholder="Password" 
            name="password" 
            required 
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
            id="password-confirm" 
            type="password" 
            class="form-control" 
            name="password_confirmation" 
            required 
            placeholder="Confirme password"
            autocomplete="new-password">

        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" required> Acepto los 
                <a 
                    href="javascript:void(0)" 
                    data-toggle="modal" 
                    data-target="#modal-default">
                    términos
                </a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{ route('login') }}" class="text-center">Ya estoy registrado</a>
  </div>
  <!-- /.form-box -->
</div>



<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Términos y Condiciones</h4>
      </div>
      <div class="modal-body">
        <p>Aqui van los terminos y condiciones&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
