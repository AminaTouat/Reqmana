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
            <li class="treeview">
                <a href="#">
                    <i data-feather="folder"></i>
                    <span>{{$projet->title}}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview"><a href="#">
                        <i class="ti-more"></i>Use case</a>

                     <ul class="treeview-menu">
                         <li class="{{ ($route =='add.useCase')?'active':'' }}"><a href="{{ route('add.useCase',$projet->id) }}"><i class="ti-hand-point-up"></i>Add use case</a></li>
                        <li class="treeview">
                            <a href="#"><i class="ti-more"></i>user requirements</a>
                            {{-- @if(!$projet->usecases->isEmpty()) --}}
                            <ul class="treeview-menu">
                                <li class="{{ ($route =='requirements.add'|| $route=='requirements.view' ||$route=='requirementsUse.add'||$route=='requirements.detail'||$route=='requirements.edit' ) ?'active':'' }}"><a href="{{ route('requirements.view',$projet->id) }}"><i class="ti-hand-point-up"></i>Add user requirements </a></li>
                               
                                <li class="treeview"><a href="#">
                                    <i class="ti-more"></i>software requirements</a>
                                    {{-- @if(!$projet->exigences->isEmpty()) --}}
                                <ul class="treeview-menu"> <li class="{{ ($route =='Srequirements.add'||$route =='SrequirementsUser.add'|| $route=='Srequirements.view' ||$route=='Srequirements.detail' ||$route=='Srequirements.edit' )?'active':'' }}"><a href="{{ route('Srequirements.view',$projet->id) }}"><i class="ti-hand-point-up"></i>Add software requirements </a>
                                </li>
                                
                                </ul>
                                {{-- @endif --}}
                            </li>
                           
                            </ul>
                            {{-- @endif --}}
                         </li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li class="{{ ($route == 'users.message'||$route =='users.send')?'active':'' }}">
                <a href="{{ route('users.message',$projet->id) }}">
                    <i data-feather="message-circle"></i>
                    <span>Messages</span>
                </a>
            </li>

            @if($resultat->role == 'chef_projet' )
             <li class="treeview {{ ($prefix == '/users')?'active':'' }} ">
                <a href="#">
                    <i data-feather="users"></i>
                    <span>Stakeholders management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route =='user.view')?'active':'' }}"><a href="{{ route('user.view',$projet->id) }}"><i class="ti-more"></i>list of stakeholders</a></li>
                    <li class="{{ ($route =='users.add')||($route =='users.exist.add')?'active':'' }}"><a a href="{{ route('users.exist.add',$projet->id) }}"><i class="ti-more"></i>Add stakeholders</a></li>
                </ul>
            </li>
            @endif
            
           

        </ul>
    </section>

</aside>