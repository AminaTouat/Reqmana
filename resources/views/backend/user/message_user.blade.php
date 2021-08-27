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
                  
                    <h5 class="box-title"><i class="fa fa-fw fa-user"></i>Message</h5>
    
                </div>
                <!-- /.box-header -->
                
                <div class="box-body">
                   ....
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