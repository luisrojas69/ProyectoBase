@extends('layouts.master')

@section('title-page', 'Página Base')

@section('content-header')
  
  <h1>
    @yield('title-page')
    <small>{{ config('app.name') }}</small>
  </h1>

	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li class="active">@yield('title-page')</li>
	</ol>

@endsection

@section('content-body')

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">@yield('title-page')</h3>
        </div>

        <div class="box-body">
          Seccion del Contenido
        </div>
        

        <div class="box-footer">
          Footer
        </div>

      </div>

@endsection