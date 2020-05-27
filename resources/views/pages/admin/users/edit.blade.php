@extends('layouts.master')

@section('title-page', 'Perfil de Usuario')


@section('content-header')
  
  <h1>
    @yield('title-page')
    <small>{{ config('app.name') }}</small>
  </h1>

	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"><i class="fa fa-user"></i> Usuarios</a></li>
		<li class="active">@yield('title-page')</li>
	</ol>

@endsection

@section('content-body')

<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/avatars/'.$user->avatar) }}" alt="User profile picture">

        <h3 class="profile-username text-center">{{ $user->name }}</h3>

        <p class="text-muted text-center">{{ $user->title }}</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>email</b> <a class="pull-right">{{ $user->email }}</a>
          </li>
          <li class="list-group-item">
            <b>Miembro desde</b> <a class="pull-right">{{ $user->created_at->format('m-Y') }}</a>
          </li>
        </ul>
        
        <a href="javascript:void(0)" id="{{ $user->id }}" class="btn btn-danger btn-block btn-delete"><b>Eliminar Usuario</b></a>
        
        <form action="{{ route('user.destroy', $user) }}" id="form-destroy-{{$user->id }}" method="POST">
          @csrf @method('DELETE')
        </form>

        <hr>

        <a href="{{ route('user.index') }}" class="btn btn-primary btn-block"><b>Ir a lista de Usuarios</b></a>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li id="li-activity" class="active"><a href="#activity" data-toggle="tab">Resumen</a></li>
        <li id="li-timeline"><a href="#timeline" data-toggle="tab">Timeline</a></li>
        <li id="li-settings"><a href="#settings" data-toggle="tab">Editar</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="{{ asset('img/avatars/'.$user->avatar) }}" alt="user image">
                  <span class="username">
                    <a href="#">{{ $user->name }}</a>
                  </span>
              <span class="description">Regitrado el dia {{ $user->created_at->format('d-m-Y') }}</span>
            </div>
            <!-- /.user-block -->
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>
          </div>
          <!-- /.post -->

        </div>
        
        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">
          <!-- The timeline -->
          <ul class="timeline timeline-inverse">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    10 Feb. 2014
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                </h3>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-comments bg-yellow"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                <div class="timeline-body">
                  Take me to your leader!
                  Switzerland is small and neutral!
                  We are more like Germany, ambitious and misunderstood!
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    3 Jan. 2014
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-camera bg-purple"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                <div class="timeline-body">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">

          <form class="form-horizontal" id="form-edit" method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf @method('PUT')

            <div class="form-group @error('name') has-error @enderror">
              <label for="inputName" class="col-sm-2 control-label">Nombre</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="inputName" placeholder="Nombre Completo">
                @error('name')
                  <span class="help-block" role="alert">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group @error('title') has-error @enderror">
              <label for="inputTitle" class="col-sm-2 control-label">Título o Cargo</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" value="{{ $user->title }}" id="inputTitle" placeholder="Titulo">
                @error('title')
                  <span class="help-block" role="alert">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group @error('name') has-error @enderror">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="inputEmail" placeholder="Email">
                @error('email')
                  <span class="help-block" role="alert">
                      {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group @error('password') has-error @enderror">
              <label for="inputName" class="col-sm-2 control-label">Password</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                @error('password')
                    <span class="help-block" role="alert">
                        {{ $message }}
                    </span>
                @enderror
                <small class="form-text text-muted">Dejar en blanco si no desea actualizar</small>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Repetir Password</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" name="password_confirmation" id="inputPasswordConfirmation" placeholder="Introduzca nuevamente el nuevo Password">
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Estatus</label>

              <div class="col-sm-6">
                <select name="status_id" class="form-control" value="{{ $user->status->id }}">
                  @foreach ($status as $user_status)
                    <option value="{{ $user_status->id }}" 
                      {{ ($user_status->id === $user->status->id)  ? 'selected' : '' }}
                      >{{ $user_status->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Avatar:</label>

             
              <div class="col-sm-10">
                
                <label>
                  <input type="radio" name="avatar" id="avatar1" value="avatar_default.jpg"
                    {{ $user->avatar == 'avatar_default.jpg' ? 'checked' : ''}}>
                  <img class="img-responsive img-circle img-sm" src="{{ asset('img/avatars/avatar_default.jpg') }}" alt="Alt Text">
                </label>

                <label>
                  <input type="radio" name="avatar" id="avatar2" value="avatar2.png"
                    {{ $user->avatar == 'avatar2.png' ? 'checked' : ''}}>
                  <img class="img-responsive img-circle img-sm" src="{{ asset('img/avatars/avatar2.png') }}" alt="Alt Text">
                </label>

                <label>
                  <input type="radio" name="avatar" id="avatar3" value="avatar3.png"
                    {{ $user->avatar == 'avatar3.png' ? 'checked' : ''}}>
                  <img class="img-responsive img-circle img-sm" src="{{ asset('img/avatars/avatar3.png') }}" alt="Alt Text ">
                </label>

                <label>
                  <input type="radio" name="avatar" id="avatar4" value="avatar4.png"
                    {{ $user->avatar == 'avatar4.png' ? 'checked' : ''}}>
                  <img class="img-responsive img-circle img-sm" src="{{ asset('img/avatars/avatar4.png') }}" alt="Alt Text">
                </label>

                <label>
                  <input type="radio" name="avatar" id="avatar5" value="avatar5.png" 
                    {{ $user->avatar == 'avatar5.png' ? 'checked' : ''}}>
                  <img class="img-responsive img-circle img-sm" src="{{ asset('img/avatars/avatar5.png') }}" alt="Alt Text">
                </label>

              </div>

            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Editar Usuario</button>
              </div>
            </div>
          </form>

        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

@endsection

@push('additionals-scripts')

@include('layouts.messages.toast-message')

  <script>
      if(window.location.hash === '#settings'){
          $('#li-activity').removeClass('active');
          $('#li-timeline').removeClass('active');
          $('#activity').removeClass('active');
          $('#timeline').removeClass('active');
          $('#li-settings').addClass('active');
          $('#settings').addClass('active');
      }
  </script>
@endpush
