@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a>
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logoo.png')}}" alt="Logo" style="width: 115px; height: 50px;">
                    </div>
                </a>
            </div>
        </div>


        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            @if(Auth::user()->usertype == 'Admin')
            <li class="{{ ($route == 'dashboard')?'active':'' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ ($prefix == '/users')?'active':'' }} ">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Gestion des utilisateurs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>Liste des utilisateurs</a></li>
                    <li><a a href="{{ route('users.add') }}"><i class="ti-more"></i>Ajouter un utilisateur</a></li>
                </ul>
            </li>
            @endif
            <li class="treeview {{ ($prefix == '/profile')?'active':'' }}">
                <a href="#">
                    <i data-feather="user"></i> <span>Profil</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Profil</a></li>
                    <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>changer le mot de passe</a></li>

                </ul>
            </li>
            @if(Auth::user()->usertype == 'user')
            <li class="{{ ($route == 'exigence.view')?'active':'' }}">
                <a href="{{ route('exigence.view') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Gestion des exigences</span>
                </a>
            </li>
            @endif


        </ul>
    </section>

</aside>