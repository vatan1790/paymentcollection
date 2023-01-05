<!-- Sidemenu -->
<div class="main-sidebar main-sidebar-sticky side-menu">
				<div class="sidemenu-logo">
					<a class="main-logo" href="index.html">
						<img src="{{ URL::to('/') }}/assets/img/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
						<img src="{{ URL::to('/') }}/assets/img/brand/icon.png" class="header-brand-img icon-logo" alt="logo">
						<img src="{{ URL::to('/') }}/assets/img/brand/logo-light.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="{{ URL::to('/') }}/assets/img/brand/icon-light.png" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>
				<div class="main-sidebar-body">
					<ul class="nav">
						<li class="nav-label">Dashboard</li>
						<li class="nav-item show">
							<a class="nav-link" href="{{ URL::to('/') }}"><i class="fe fe-airplay"></i><span class="sidemenu-label">Dashboard</span></a>
						</li>
						 @can('role-list')
						<li class="nav-label">Applications</li>
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('roles') }}"><i class="fe fe-user"></i><span class="sidemenu-label">Role</span></a>
						</li>

						@endcan
						 @can('permission-list')
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('permissions') }}"><i class="fe fe-settings"></i><span class="sidemenu-label">Permission</span></a>
						</li>

						@endcan
                        @if(Auth::user()->type == 'admin')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('users') }}"><i class="fe fe-users"></i><span class="sidemenu-label">Users</span></a>
						</li>
						@endif
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('customers') }}"><i class="fe fe-users"></i><span class="sidemenu-label">Cutomer</span></a>
						</li>

						
						
					</ul>
				</div>
			</div>
			<!-- End Sidemenu -->