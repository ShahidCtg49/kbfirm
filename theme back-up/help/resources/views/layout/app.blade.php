<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>{{Session::get('identity')}} | @yield('title')</title>

		<meta name="description" content="top menu &amp; navigation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome
		<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}" /> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
		<link rel="stylesheet" href="{{asset('public/assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{asset('public/assets/css/fonts.googleapis.com.css')}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{asset('public/assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="{{asset('public/assets/css/ace-part2.min.css')}}" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{asset('public/assets/css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{asset('public/assets/css/ace-rtl.min.css')}}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="{{asset('public/assets/css/ace-ie.min.css')}}" />
		<![endif]-->
<style>
    body{
        font-family:Poppins;
    }
    @media print {
        .no-print{display:none;}
    }
    
</style>
		<!-- inline styles related to this page -->
		@stack('style')
		<!-- ace settings handler -->
		<script src="{{asset('public/assets/js/ace-extra.min.js')}}"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="{{asset('public/assets/js/html5shiv.min.js')}}"></script>
		<script src="{{asset('public/assets/js/respond.min.js')}}"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar      h-sidebar ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					Logo Here 
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">

					<li class="active open hover">
						<a href="#">
							<span class="menu-text"> Dashboard </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="hover">
						<a href="#" class="dropdown-toggle">
							<span class="menu-text">MTL CRM</span>
						</a>
						<ul class="submenu">
							<li class="hover">
								<a href="" class="dropdown-toggle">Clients</a>
								<ul class="submenu">
									<li class="hover">
										<a href="{{ route('clients.index') }}">Manage Clients</a>
									</li>
								</ul>
							</li>
							<li class="hover">
								<a href="" class="dropdown-toggle">Manage Invoice</a>
								<ul class="submenu">
									<li class="hover">
										<a href="{{ route('invoice.index') }}">New Invoice</a>
									</li>
									<li class="hover">
										<a href="owner_table.html">Invoice List</a>
									</li>
								</ul>
							</li>
							<li class="hover">
								<a href="" class="dropdown-toggle">Manage Order</a>
								<ul class="submenu">
									<li class="hover">
										<a href="{{ route('order.create') }}">New Order</a>
									</li>
									<li class="hover">
										<a href="{{ route('order.index') }}">Order List</a>
									</li>
								</ul>
							</li>
							
							<li class="hover">
								<a href="#" class="dropdown-toggle">Settings</a>
								<ul class="submenu">
									<!--<li class="hover">
										<a href="#">
											Lavel 2
										</a>
									</li>-->
									<li class="hover">
										<a href="#" class="dropdown-toggle">
										CRM Settings
										</a>
										<ul class="submenu">
											<li class="hover">
												<a href="{{ route('service.create') }}">
												Add Service
												</a>
											</li>
											<li class="hover">
												<a href="#">Location Settings</a>
											</li>
										</ul>
									</li>
									<li class="hover">
										<a href="#" class="dropdown-toggle">
										Company  Settings
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="open hover">
						<a href="#" class="dropdown-toggle">
							<span class="menu-text">
							MTL Accounts
							</span>
							
						</a>
						<ul class="submenu">
							<li class="hover">
								<a href="" class="dropdown-toggle">
								Voucher
								</a>
								<ul class="submenu">
									<li class="active hover">
										<a href="{{ route(currentUser().'.drvoucher.index') }}">Debit Voucher</a>
									</li>
									<li class="hover">
										<a href="{{ route(currentUser().'.crvoucher.index') }}">Credit Voucher</a>
									</li>
									<li class="hover">
										<a href="{{ route(currentUser().'.journal.index') }}">Journal Voucher</a>
									</li>
								</ul>
							</li>
							<li class="hover">
								<a href="" class="dropdown-toggle">
									Report
									
								</a>
								<ul class="submenu">
									<li class="hover">
										<a href="{{route(currentUser().'.headreport')}}">Head Wise Report</a>
									</li>
									<li class="hover">
										<a href="{{route(currentUser().'.profitloss')}}">Profit Loss</a>
									</li>
									<li class="hover">
										<a href="{{route(currentUser().'.balancesheet')}}">Balance Sheet</a>
									</li>
									<li class="hover">
										<a href="{{route(currentUser().'.rcvdpayment_pending')}}">Pending Payment</a>
									</li>
								</ul>
							</li>
							<li class="hover">
								<a href="#" class="dropdown-toggle">
									Settings
								</a>
								<ul class="submenu">
									<li class="hover">
										<a href="#" class="dropdown-toggle">Accounts Head</a>
										<ul class="submenu">
											<li class="hover">
												<a href="{{ route('masterhead.index') }}">Master Head</a>
											</li>
											<li class="hover">
												<a href="{{ route('subhead.index') }}">Sub Head</a>
											</li>
											<li class="hover">
												<a href="{{ route('chieldone.index') }}">Chield Head One</a>
											</li>
											<li class="hover">
												<a href="{{ route('chieldtwo.index') }}">Chield Head Two</a>
											</li>
										</ul>
									</li>
									<li class="hover">
										<a href="#" class="dropdown-toggle">Company  Settings</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="hover">
						<a href="#" class="dropdown-toggle">
							<span class="menu-text">HRM</span>
						</a>
						<ul class="submenu">
							<li class="hover">
								<a href="" class="dropdown-toggle">Employee</a>
								<ul class="submenu">
									<li class="active hover">
										<a href="{{ route('employeebasic.index') }}">Manage Employee</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="hover">
						<a href="#" class="dropdown-toggle">
							<span class="menu-text">Settings</span>
						</a>
						<ul class="submenu">
							<li class="hover">
								<a href="" class="dropdown-toggle">PMS Settings</a>
								<ul class="submenu">
									<li class="active hover">
										<a href="{{ route('pmscategory.index') }}">Main Category</a>
									</li>
									<li class="hover">
										<a href="{{ route('pmssubcategory.index') }}">Sub Category</a>
									</li>
									<li class="hover">
									    <a href="{{ route('pmschieldcategory.index') }}">Chield Category</a>
									</li>
									<li class="hover">
										<a href="{{ route('pmsbrand.index') }}">Brand</a>
									</li>
									<li class="hover">
										<a href="{{ route('pmswarehouse.index') }}">Ware House</a>
									</li>
								</ul>
							</li>
							<li class="hover">
								<a href="" class="dropdown-toggle">
									HRM Settings
									
								</a>
								<ul class="submenu">
									<li class="active hover">
										<a href="{{ route('hrmdesignation.index') }}">Designation</a>
									</li>
									<li class="hover">
										<a href="{{ route('department.index') }}">Department</a>
									</li>
									<li class="hover">
										<a href="{{ route('empcategory.index') }}">Employee Category</a>
									</li>
									<li class="hover">
										<a href="{{ route('shift.index') }}">Shift</a>
									</li>
									<li class="hover">
										<a href="{{ route('project.index') }}">Project</a>
									</li>
									<li class="hover">
										<a href="{{ route('division.index') }}">Division</a>
									</li>
									<li class="hover">
										<a href="{{ route('grade.index') }}">Grade</a>
									</li>
									<li class="hover">
										<a href="{{ route('roster.index') }}">Roster Group</a>
									</li>
									<li class="hover">
										<a href="{{ route('location.index') }}">Job Location</a>
									</li>
									<li class="hover">
										<a href="{{ route('section.index') }}">Job Section</a>
									</li>
									<li class="hover">
										<a href="{{ route('empstatus.index') }}">Employee Status</a>
									</li>
								</ul>
							</li>
							<li class="hover">
								<a href="" class="dropdown-toggle">Company Settings</a>
								<ul class="submenu">
									<li class="active hover">
										<a href="{{ route('company.index') }}">Company</a>
									</li>
									<li class="hover">
										<a href="{{ route('branch.index') }}">Branch</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">

						@yield('content')
						
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Powered By </span>
							Muktodhara Technology Limited 
						</span>

					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="{{asset('public/assets/js/jquery-2.1.4.min.js')}}"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="{{asset('public/assets/js/ace-elements.min.js')}}"></script>
		<script src="{{asset('public/assets/js/ace.min.js')}}"></script>

		<!-- inline scripts related to this page -->
		@stack('script')
	</body>
</html>
