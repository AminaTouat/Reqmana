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

             {{-- @if(Auth::user()->usertype == 'user') --}}
              <li class="{{ ($route == 'user.inv')?'active':'' }}">
                    <a href="{{ route('user.inv') }}">
                        <i data-feather="user"></i>
                        <span>invitations</span>
                    </a>
                </li>
        
           
            
        </ul>
    </section>

</aside>