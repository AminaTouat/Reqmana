
  <header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
					<i class="nav-link-icon mdi mdi-menu"></i>
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>

		  </ul>
	  </div>


      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		  <!-- full Screen -->


@php
 $user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp
            <ul class="nav pt-2 mr-3">
                <li class="nav-item">
					{{-- @if(Auth::user()->role == 'chef_projet') --}}
					@if(Auth::check())
                        <a class="btn btn-primary" href="{{ route('project.new') }}">New project</a>
                    @endif
                </li>
            </ul>

			<li class="dropdown user user-menu">
				<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
					<img src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" alt="">
				</a>
				<ul class="dropdown-menu">
				  <li class="user-body">
		 <a class="dropdown-item" href="{{ route('profile.view') }}"><i class="ti-user text-muted mr-2"></i> Profile</a>
					 <div class="dropdown-divider"></div>
					 <a class="dropdown-item" href="{{ route('user.logout') }}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
				  </li>
				</ul>
			  </li>
        </ul>
      </div>
    </nav>
  </header>
