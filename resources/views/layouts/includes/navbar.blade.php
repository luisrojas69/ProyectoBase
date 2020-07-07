<header class="main-header">

  <!-- Logo -->
  <a href="{{ route('home') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>P</b>LR</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>LGR</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
       @if ($noLeidas = auth()->user()->unReadNotifications->count())
          
        <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o"></i>
              <span class="label label-success">{{ $noLeidas }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes {{ $noLeidas }} 
                {{ $noLeidas > 1 ? 'notificaciones' : 'notificación'}}
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach (auth()->user()->unReadNotifications as $notification)
                    <li><!-- start message -->
                      <a 
                        href="" 
                        data-toggle="modal"
                        data-target="#modal-notifications"
                        data-title="{{ $notification->data['title'] }}"
                        data-sender="{{ $notification->data['sender'] }}"
                        data-created_at="{{ $notification->created_at->format('d-m-Y') }}"
                        data-body="{!! $notification->data['body'] !!}">
                        <div class="pull-left">
                          <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle" alt="img">
                        </div>
                        <h4>
                          {{ $notification->data['title'] }}
                          <small><i class="fa fa-clock-o"></i> {{ $notification->created_at->diffForHumans() }}</small>
                        </h4>
                        <small>Enviado por: {{ $notification->data['sender'] }}</small>
                      </a>
                    </li>
                  @endforeach
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="{{ route('message.index') }}">Ver todas</a></li>
            </ul>
          </li>
       @else
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header text-center text-red">Usted no tiene nuevas notificaciones</li>
              <li class="footer"><a href="#">Ver notificaciones leidas</a></li>
            </ul>
          </li>
        @endif
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="{{ asset('img/avatars/'.auth()->user()->avatar) }}" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{ auth()->user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="{{ asset('img/avatars/'.auth()->user()->avatar) }}" class="img-circle" alt="User Image">

              <p>
                {{ Auth::user()->name }}  - {{ auth()->user()->title }}
                <small>Miembro desde {{ auth()->user()->created_at->diffForHumans() }}</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Mi Perfil</a>
              </div>
              <form id="logout-form" 
                    action="{{ route('logout') }}" 
                    method="POST" 
                    style="display: none;">
                    {{ csrf_field() }}
              </form>

              <div class="pull-right">
                <a href="javascript:void(0)" 
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                  class="btn btn-default btn-flat">Cerrar Sesión</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

  <!-- /.modal -->
    <div class="modal fade" id="modal-notifications">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal-title"></h4>
          </div>
          <div class="modal-body">
            <div class="post">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="{{ asset('img/avatars/'.auth()->user()->avatar) }}" alt="user image">
                    <span class="username">
                      <a href="#" id="modal-sender"></a>
                    </span>
                <span class="description" id="modal-created_at"></span>
              </div>
              <!-- /.user-block -->
              <p id="modal-body"></p>
              <ul class="list-inline">
                    <li></li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-envelope-o margin-r-5"></i>Marcar como Ledia</a></li>
                  </ul>
            </div>
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


@push('additionals-scripts')
  <script>

    $(function(){
          $('#modal-notifications').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var title = button.data('title')
          var body  = button.data('body')
          var sender  = button.data('sender')
          var created_at  = button.data('created_at')
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('#modal-title').text(title)
          modal.find('#modal-body').html(body)
          modal.find('#modal-sender').text(sender)
          modal.find('#modal-created_at').text(created_at)

  })

    });
    
  </script>
@endpush