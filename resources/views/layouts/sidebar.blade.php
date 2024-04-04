<!-- Sidemenu -->
<div class="main-sidebar main-sidebar-sticky side-menu">
				<div class="sidemenu-logo">
					<a class="main-logo" href="index.html">
						<img src="{{ URL::to('/') }}/assets/img/brand/mobile-app-Logo2.png" class="header-brand-img desktop-logo" alt="logo">
						<img src="{{ URL::to('/') }}/assets/img/brand/mobile-app-Logo2.png" class="header-brand-img icon-logo" alt="logo">
						<img src="{{ URL::to('/') }}/assets/img/brand/mobile-app-Logo2.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="{{ URL::to('/') }}/assets/img/brand/mobile-app-Logo2.png" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>
				<div class="main-sidebar-body">
					<ul class="nav">
						<li class="nav-label">Dashboard</li>
						<li class="nav-item show">
							<a class="nav-link" href="{{ URL::to('/') }}"><i class="fe fe-airplay"></i><span class="sidemenu-label">Dashboard</span></a>
						</li>
						<li class="nav-label">Applications</li>
                        <!-- <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('roles') }}"><i class="fe fe-user"></i><span class="sidemenu-label">Role</span></a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('permissions') }}"><i class="fe fe-settings"></i><span class="sidemenu-label">Permission</span></a>
						</li> -->

						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('users') }}"><i class="fe fe-user"></i><span class="sidemenu-label">Agent</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('customers') }}"><i class="fe fe-users"></i><span class="sidemenu-label">Customer</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('monthly-report') }}"><i class="fa fa-briefcase"></i><span class="sidemenu-label">Monthly Report</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('po-report') }}"><i class="fa fa-briefcase"></i><span class="sidemenu-label">Po Report</span></a>
						</li>

						
						
					</ul>
				</div>
			</div>
			<!-- End Sidemenu -->