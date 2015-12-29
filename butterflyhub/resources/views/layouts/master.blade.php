<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<meta content="{{ csrf_token() }}" name="csrf_token">
	
	<title>ButterflyHub | Admin Panel</title>
	
	<link href="{{ url('/') }}/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="{{ url('/') }}/img/favicon.ico" rel="icon" type="image/x-icon">
	<link href="{{ url('/') }}/css/bootstrap.min.css?v=3.3.5" rel="stylesheet" type="text/css">
	@yield('styles')
	
	<link href="{{ url('/') }}/css/admin.css?v=1.0.0" rel="stylesheet" type="text/css">
	<link href="{{ url('/') }}/css/components.css?v=1.0.0" rel="stylesheet" type="text/css">
	<link href="{{ url('/') }}/fonts/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="{{ url('/') }}/fonts/simple-line-icons-webfont/simple-line-icons.css" rel="stylesheet" type="text/css">
	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>   
	
	<!--[if lte IE 7]><script src=simple-line-icons-webfont/icons-lte-ie7.js"></script><![endif]-->
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
	<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="{{ url('/') }}">
					<img alt="logo" class="logo-default" src="{{ url('/') }}/img/logo-white.png">
				</a>
				<div class="menu-toggler sidebar-toggler"></div>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a class="menu-toggler responsive-toggler" data-target=".navbar-collapse" data-toggle="collapse" href="#"></a> 
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN PAGE TOP -->
			<div class="page-top">
				<div class="page-title-container">
					<h3 class="page-title">
						@yield('page-name')
					</h3>
				</div>
				
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown dropdown-user">
							<a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
								<img alt="" class="img-circle" src="{{ url('/') }}/img/no_avatar.png">
								<span class="username username-hide-on-mobile">Admin</span> 
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="#"><i class="icon-user"></i> My Profile</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#"><i class="icon-key"></i> Log Out</a>
								</li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
				</div><!-- END TOP NAVIGATION MENU -->
			</div><!-- END PAGE TOP -->
		</div><!-- END HEADER INNER -->
	</div><!-- END HEADER -->
    <div class="clearfix"></div>
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- END SIDEBAR -->
			<div class="page-sidebar navbar-collapse collapse">
				<ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="nav-item start @yield('dashboard-active')">
						<a href="{{ url('/') }}" class="nav-link nav-toggle">
							<i class="icon-home"></i>
							<span class="title">Dashboard</span>
							<span class="arrow @yield('dashboard-arrow-open')"></span>
						</a>                            
					</li>
					<li class="nav-item @yield('taxa-active')">
						<a href="{{ url('taxa') }}" class="nav-link nav-toggle">
							<i class="icon-settings"></i>
							<span class="title">Taxa</span>
							<span class="selected"></span>
							<span class="arrow @yield('taxa-arrow-open')"></span>
						</a>
						<ul class="sub-menu">
							<li class="nav-item @yield('sm-taxalist-open')">
								<a href="{{ url('taxa') }}" class="nav-link ">
									<span class="title">Taxa list</span>
								</a>
							</li>
							<li class="nav-item @yield('sm-categorylist-open')">
								<a href="{{ url('categories') }}" class="nav-link ">
									<span class="title">Category list</span>
									<span class="selected"></span>
								</a>
							</li>                               
						</ul>
					</li>
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
			<!-- END SIDEBAR -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<!-- BEGIN CONTENT BODY -->
			<div class="page-content">
				<div class="page-bar">
					<ul class="page-breadcrumb">
						@yield('breadcrumb')							
					</ul>
					<div class="page-toolbar">
						<div class="btn-group pull-right">
							<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> Actions
								<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								@yield('actions')
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						@yield('content')
					</div>
				</div>
			</div>               
			<!-- END CONTENT BODY -->
		</div>
		<!-- END CONTENT -->
	</div>
		
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
			<?php echo date("Y"); ?> © ButterflyHub by <a href="http://designs.shinbu.net">Shinbu Designs</a>
		</div>
		<div class="scroll-to-top" style="display: none;">
			<i class="icon-arrow-up"></i>
		</div>
	</div><!-- END FOOTER -->

	<script src="{{ url('/') }}/js/jquery-2.1.4.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/js/bootstrap.js?v=3.3.5" type="text/javascript"></script>
	<script src="{{ url('/') }}/js/js.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/js/app.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/js/jquery.bootpag.min.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/js/ui-general.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/js/layout.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/js/demo.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/js/quick-sidebar.js" type="text/javascript"></script>
	@yield('scripts')
</body>
</html>