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
  <example-component></example-component>
@endsection