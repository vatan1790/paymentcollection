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
                        <!-- <li class="nav-item">
							<a class="nav-link" href="https://laravel.spruko.com/dashlead/Leftmenu-Icon-Light/widgets"><i class="fe fe-database"></i><span class="sidemenu-label">Role Permission</span></a>
						</li> -->

                        @can('industrysegments-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('industrysegments') }}"><i class="fe fe-toggle-right"></i><span class="sidemenu-label">Industry Segment</span></a>
						</li>
						@endcan
                        @can('uoms-list')
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('uoms') }}"><i class="fe fe-package"></i><span class="sidemenu-label">UOM</span></a>
						</li>
						@endcan

                        @can('taxes-list')
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('taxes') }}"><i class="fe fe-book"></i><span class="sidemenu-label">TAX</span></a>
						</li>
						@endcan
						@can('businesses-list')
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('businesses') }}"><i class="fe fe-trending-down"></i><span class="sidemenu-label">Business</span></a>
						</li>
						@endcan
						@can('businessactivities-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('businessactivities') }}"><i class="fe fe-trending-up"></i><span class="sidemenu-label">Business Activity</span></a>
						</li>

						@endcan

						@can('branches-list')
                        <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('branches') }}"><i class="fe fe-bookmark"></i><span class="sidemenu-label">Branches</span></a>
						</li>
						@endcan

						@if(Auth::user()->type == 'admin')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('users') }}"><i class="fe fe-users"></i><span class="sidemenu-label">Users</span></a>
						</li>
						@endif

						
						{{-- <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('userbranches') }}"><i class="fe fe-database"></i><span class="sidemenu-label">UserBranch</span></a>
						</li> --}}
						@can('brands-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('brands') }}"><i class="fe fe-zap"></i><span class="sidemenu-label">Brand</span></a>
						</li>
						@endcan

						@can('vendors-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('vendors') }}"><i class="fe fe-shopping-bag"></i><span class="sidemenu-label">Vendor</span></a>
						</li>
						@endcan

						@can('vendorbrands-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('vendorbrands') }}"><i class="fe fe-server"></i><span class="sidemenu-label">Vendor Brand</span></a>
						</li>
						@endcan

						@can('material-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('material') }}"><i class="fe fe-shuffle"></i><span class="sidemenu-label">Material Master</span></a>
						</li>
						@endcan

						@can('materialin-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('materialin') }}"><i class="fe fe-speaker"></i><span class="sidemenu-label">Material In</span></a>
						</li>
						@endcan

						@can('materialvendor-list')
						<!-- <li class="nav-item">
							<a class="nav-link" href="{{ URL::to('materialvendor') }}"><i class="fe fe-save"></i><span class="sidemenu-label">Material Vendor</span></a>
						</li> -->
						@endcan

						@can('product-list')
						
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('product') }}"><i class="fe fe-speaker"></i><span class="sidemenu-label">Project Line</span></a>
						</li>
						@endcan

						@can('category-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('categorys') }}"><i class="fe fe-bar-chart"></i><span class="sidemenu-label">Category</span></a>
						</li>
						@endcan

						@can('subcategorys-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('subcategorys') }}"><i class="fe fe-bar-chart-2"></i><span class="sidemenu-label">Sub Category</span></a>
						</li>
						@endcan

						@can('customermaster-list')
						
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('customermaster') }}"><i class="fe fe-user"></i><span class="sidemenu-label">Customer Master</span></a>
						</li>
						@endcan

						@can('inventory-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('inventory') }}"><i class="fe fe-square"></i><span class="sidemenu-label">Inventory</span></a>
						</li>
						@endcan

						@can('inventory-history')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('inventory-history') }}"><i class="fe fe-square"></i><span class="sidemenu-label">Inventory History</span></a>
						</li>
						@endcan

						@can('invoice-list')
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('invoice') }}"><i class="fe fe-file-text"></i><span class="sidemenu-label">Invoice</span></a>
						</li>
						@endcan
						
						
					</ul>
				</div>
			</div>
			<!-- End Sidemenu -->