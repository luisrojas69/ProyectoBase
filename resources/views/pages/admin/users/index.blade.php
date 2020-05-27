@extends('layouts.master')

@section('title-page', 'Lista de Usuarios')

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

<div class="row">
  <div class="col-xs-12">
    <!-- /.box -->

    <div class="box">
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Status</th>
            <th class="text-center">Last Login</th>
            <th class="text-center">Acciones</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td><span class="label
                @switch($user->status->id)
                    @case(1)
                        label-success
                        @break
                    @case(2)
                        label-warning
                        @break
                    @default
                         label-danger
                        @break  
                @endswitch
                ">{{ $user->status->name }}</span></td>

              <td class="text-center">{{ $user->last_login != null ? $user->last_login->diffForHumans() : '-' }}</td>

              <td class="text-center">
                <a href="{{ route('user.edit', $user->id) }}"><span class="label label-primary"><i class="fa fa-pencil"></i></span></a>
                
                <a 
                  href="javascript:void(0)" 
                  class="btn-delete" 
                  id="{{ $user->id }}">
                  <span class="label label-danger"><i class="fa fa-trash"></i></span>
                </a>

                <form action="{{ route('user.destroy', $user->id) }}" id="form-destroy-{{$user->id }}" method="POST">
                  @csrf @method('DELETE')
                </form>
              </td>
            </tr>
          @endforeach  
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@endsection

@push('additionals-scripts')
  @include('layouts.messages.toast-message')
@endpush
