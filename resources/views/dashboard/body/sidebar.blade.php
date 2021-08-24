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

              @foreach($projets as $projet)
                 @if($projet->users()->find(Auth::id()))
            <li class="{{ ($route == 'project.current')?'active':'' }}">
                <a href="{{ route('project.current',$projet->id) }}">
                    <i data-feather="pie-chart"></i>
                    <span>{{$projet->title}}</span>
                </a>
            </li>
            @endif
             @endforeach
        </ul>
    </section>

</aside>