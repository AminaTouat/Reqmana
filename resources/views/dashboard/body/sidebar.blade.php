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
            {{-- <li class="treeview {{ ($prefix == '/users')?'active':'' }} ">
                <a href="#">
                    <i data-feather="bell"></i>
                    <span>activityt</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('user.inv') }}"><i class="ti-user"></i>invitations</a></li>
                   
                </ul>
            </li>
             --}}
             <li class="{{ ($route == 'user.inv')?'active':'' }}">
                <a href="{{ route('user.inv') }}">
                    <i data-feather="user"></i>
                    <span>invitations</span>
                </a>
            </li>
              @foreach($projets as $projet)
                 
            <li class="{{ ($route == 'project.current')?'active':'' }}">
                <a href="{{ route('project.current',$projet->id) }}">
                    <i data-feather="folder"></i>
                    <span>{{$projet->title}}</span>
                </a>
            </li>
             @endforeach
        </ul>
    </section>

</aside>
{{-- <li class=""><a a href="{{ route('users.message') }}"><i class="ti-comment-alt"></i>messages</a></li> --}}