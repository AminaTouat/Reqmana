@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a >
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logoo.png')}}" alt="Logo"
                             style="width: 115px; height: 50px;">
                    </div>
                </a>
            </div>
        </div>


        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            @if(Auth::user()->usertype == 'user')
              @foreach($projets as $projet)
                 @if(Auth::id()== $projet->user_id)
            {{-- <li class="treeview {{ ($prefix == '/users')?'active':'' }} ">
                <a href="#"  id="info" >
                    <i data-feather="message-circle"></i>
                    <span>{{$projet->title}}</span>
                    <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
                </a>
                
            </li> --}}
            <li class="{{ ($route == 'dashboardUser')?'active':'' }}">
                <a href="{{ route('dashboardUser',$projet->user_id) }}">
                    <i data-feather="pie-chart"></i>
                    <span>{{$projet->title}}</span>
                </a>
            </li>    
            @endif
             @endforeach
             <li class="treeview {{ ($prefix == '/users')?'active':'' }} ">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Stakeholders management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>list of stakeholders</a></li>
                    <li><a a href="{{ route('users.add') }}"><i class="ti-more"></i>Add stakeholders</a></li>
                </ul>
            </li>
            
            @endif

        </ul>
    </section>

</aside>