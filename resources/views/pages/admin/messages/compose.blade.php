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

 <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="mailbox.html" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="mailbox.html"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right">12</span></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Labels</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      <form action="{{ route('message.store') }}" method="POST"> 
        @csrf
     
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Redactar nuevo mensaje</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group {{ $errors->has('recipient_id') ? 'has-error' : '' }}">
                <select class="form-control" name="recipient_id">
                  <option value="">Seleccione el usuario</option>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
                {!! $errors->first('recipient_id', "<span class='help-block'>:message</span>") !!}
              </div>
              <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                <input class="form-control" name="subject" placeholder="Subject:">
                {!! $errors->first('subject', "<span class='help-block'>:message</span>") !!}
              </div>
              <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                    <textarea id="message" name="body" class="form-control" style="height: 300px" placeholder="Escribe tu mensaje">
                      
                    </textarea>
                    {!! $errors->first('body', "<span class='help-block'>:message</span>") !!}
              </div>
              {{-- <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div> --}}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
              {{--   <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> --}}
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar Mensaje</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Descartar</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
      </form>  
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection

@push('additionals-scripts')
  @include('layouts.messages.toast-message')
@endpush