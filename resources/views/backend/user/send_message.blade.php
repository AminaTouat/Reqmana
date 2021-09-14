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
    @if($users->id==$user_message->id)
    <li class="{{ (request()->is('user/message*')) ? 'active' : '' }}">
        @else
        <li >
        @endif
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
                        <div class="form-group" >
                        @if(($user_message->id== $message->parent_id && Auth::id() == $message->user_id) ||($message->parent_id==Auth::id()&& $message->user_id ==$user_message->id) )
                        <strong>{{ $message->user->name }}</strong>
                        <p>{{ $message->body }}</p>
                        @if(!empty($message->image))
                        <img class=" mx-auto" onclick="window.open(this.src,'_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=224, height=224');"
                        src="
    {{url('upload/message/'.$message->image) }}" alt="User Avatar"
                        style="width: 100px; border: 1px solid rgb(14, 13, 13);">
                        @endif
                        @endif
                        </div>
                        @endforeach
                        <form method="post" action="{{ url('/user/message/store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="body"></textarea>
                                <input type="hidden" name="projet_id" value="{{ $projet->id }}" />
                                <input type="hidden" name="parent_id" value="{{ $user_message->id }}" />
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="image" type="file" name="image"
                                           class="form-control"
                                           value="">
                                </div>
                            </div><!-- End Col Md-6 -->
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Send" style="float: right;"/>
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