<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">
		<!-- Favicon -->
		<link rel="icon" href="{{ URL::to('/') }}/assets/img/brand/favicon.ico" type="image/x-icon">

		<!-- Title -->
		 @yield('title')

		<!---Fontawesome css-->
		<link href="{{ URL::to('/') }}/assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

		<!---Ionicons css-->
		<link href="{{ URL::to('/') }}/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

		<!---Typicons css-->
		<link href="{{ URL::to('/') }}/assets/plugins/typicons.font/typicons.css" rel="stylesheet">

		<!---Feather css-->
		<link href="{{ URL::to('/') }}/assets/plugins/feather/feather.css" rel="stylesheet">

		<!---Falg-icons css-->
		<link href="{{ URL::to('/') }}/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

		<!---Style css-->
		<link href="{{ URL::to('/') }}/assets/css/style.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/custom-style.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/skins.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/dark-style.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/css/custom-dark-style.css" rel="stylesheet">

		<!---Select2 css-->
        <link href="{{ URL::to('/') }}/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
        <!--Mutipleselect css-->
        <link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugins/multipleselect/multiple-select.css">
        <!---Jquery.mCustomScrollbar css-->
        <link href="{{ URL::to('/') }}/assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

		<!---Sidebar css-->
		<link href="{{ URL::to('/') }}/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!---Sidemenu css-->
		<link href="{{ URL::to('/') }}/assets/plugins/sidemenu/sidemenu.css" rel="stylesheet">
		
		
		<!---Switcher css-->
		<link href="{{ URL::to('/') }}/assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/switcher/demo.css" rel="stylesheet">	

			<!---DataTables css-->
		<link href="{{ URL::to('/') }}/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet">
		<!---Switcher css-->
		<link href="{{ URL::to('/') }}/assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="{{ URL::to('/') }}/assets/switcher/demo.css" rel="stylesheet">	
		<style>
			/* The switch - the box around the slider */
			.switch {
			position: relative;
			display: inline-block;
			width: 60px;
			height: 34px;
			}

			/* Hide default HTML checkbox */
			.switch input {
			opacity: 0;
			width: 0;
			height: 0;
			}

			/* The slider */
			.slider {
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ccc;
			-webkit-transition: .4s;
			transition: .4s;
			}

			.slider:before {
			position: absolute;
			content: "";
			height: 26px;
			width: 26px;
			left: 4px;
			bottom: 4px;
			background-color: white;
			-webkit-transition: .4s;
			transition: .4s;
			}

			input:checked + .slider {
			background-color: #2196F3;
			}

			input:focus + .slider {
			box-shadow: 0 0 1px #2196F3;
			}

			input:checked + .slider:before {
			-webkit-transform: translateX(26px);
			-ms-transform: translateX(26px);
			transform: translateX(26px);
			}

			/* Rounded sliders */
			.slider.round {
			border-radius: 34px;
			}

			.slider.round:before {
			border-radius: 50%;
			}
			b, strong{
				font-weight: 400;
				font-size: 15px;
			}
			.table thead th, .table thead td{
				font-weight: 400;
    			font-size: 15px;
				text-transform: capitalize;
			}
			.side-menu .nav-link:hover{
				
			}
		</style>
        @yield('links')
    </head>

	<body>
		
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ URL::to('/') }}/assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page">
			
         
		    @include('layouts.sidebar')
			<!-- Main Content-->
			<div class="main-content side-content pt-0">
				<!-- Main Header-->
				<div class="main-header side-header sticky">
					<div class="container-fluid">
						<div class="main-header-left">
							<a class="main-logo d-lg-none" href="{{ URL::to('/') }}">
								<img src="{{ URL::to('/') }}/assets/img/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
								<img src="{{ URL::to('/') }}/assets/img/brand/icon.png" class="header-brand-img icon-logo" alt="logo">
								<img src="{{ URL::to('/') }}/assets/img/brand/logo-light.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
								<img src="{{ URL::to('/') }}/assets/img/brand/icon-light.png" class="header-brand-img icon-logo theme-logo" alt="logo">
							</a>
							<a class="main-header-menu-icon" href="" id="mainSidebarToggle"><span></span></a>
						</div>
						<div class="main-header-right">
							<div class="dropdown main-profile-menu">
								<a class="main-img-user" href=""><img alt="avatar" src="{{ URL::to('/') }}/assets/img/users/1.jpg"></a>
								<div class="dropdown-menu">
									<div class="header-navheading">
										<h6 class="main-notification-title">{{Auth::user()->name}}</h6>
										<!-- <p class="main-notification-text">Web Designer</p> -->
									</div>
									<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="fe fe-power"></i>  Sign Out
									  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </a>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Main Header-->
				
                @yield('content')
			</div>
			<!-- End Main Content-->
            	
         
		@include('layouts.footer')
		</div>
		<!-- End Page -->
		@include('layouts.script')
         @yield('script')

	
	</body>
</html>