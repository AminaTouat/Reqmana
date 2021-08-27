@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
@extends('projects.current_project')
@section('projects')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-3">

<ul class="sidebar-menu" data-widget="tree">

    @foreach($allData as $key => $users )
    <li class="">
        <a href="{{ route('users.send',[$users->id,$projet->id])}}">
            <i data-feather="message-circle"></i>
            <span>{{ $users->name }}</span>
        </a>
    </li>
    @endforeach
  
   
</ul>
        </div>
        <div class="col-9">
            <div class="box">
                <div class="box-header with-border mb-4">
                  
                    <h5 class="box-title"><i class="fa fa-fw fa-user"></i>{{$user_message->name}}</h5>
    
                </div>
                <!-- /.box-header -->
                
                <div class="box-body">
                    <div class="form-group" >
                        @foreach($projet->messages as $message)
                        @if(($user_message->id== $message->parent_id && Auth::id() == $message->user_id) ||($message->parent_id==Auth::id()&& $message->user_id ==$user_message->id) )
                        <strong>{{ $message->user->name }}</strong>
                        <p>{{ $message->body }}</p>
                        @endif
                        @endforeach
                        <form method="post" action="{{ url('/user/message/store') }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="body"></textarea>
                                <input type="hidden" name="projet_id" value="{{ $projet->id }}" />
                                <input type="hidden" name="parent_id" value="{{ $user_message->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Send" />
                            </div>
                        </form>
                    </div>
                    <!-- /.row -->
                </div>                
                <!-- /.box-body -->
            </div>
        </div>
        </div>
      </section>
    </div>
</div>

@endsection