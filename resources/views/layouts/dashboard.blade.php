<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Camera - Dashboard</title>
	<link href="https://medialoot.com/preview/lumino/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://medialoot.com/preview/lumino/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://medialoot.com/preview/lumino/css/datepicker3.css" rel="stylesheet">
	<link href="https://medialoot.com/preview/lumino/css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Camera</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					@if(Auth::user()->role == 1 && Auth::user()->status == 1)
						<a class="navbar-brand" href="{{url('dashboard/admin/order')}}">การจัดการข้อมูลคำสั่งซื้อ</a>
						<a class="navbar-brand" href="{{url('dashboard/users')}}">การจัดการผู้ใช้งานระบบ</a>
					@endif

					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">{{ Auth::user()->name }}</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>ออนไลน์</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="{{url('dashboard/index')}}"><em class="fa fa-dashboard">&nbsp;</em> แผงควบคุม</a></li>
			<li><a href="{{url('dashboard/manage')}}"><em class="fa fa-calendar">&nbsp;</em>วางแผนการจัดการ</a></li>
			<li><a href="{{url('dashboard/order')}}"><em class="fa fa-bar-chart">&nbsp;</em> คำสั่งซื้อ</a></li>
			<li><a href="{{url('dashboard/promotion')}}"><em class="fa fa-dashboard">&nbsp;</em> โปรโมชั่น </a></li>
			<li><a href="{{url('dashboard/payment')}}"><em class="fa fa-dashboard">&nbsp;</em> การชำระเงิน </a></li>		
			<li><a href="{{url('dashboard/store')}}"><em class="fa fa-dashboard">&nbsp;</em> ข้อมูลร้านค้า </a></li>	
			<li><a href="{{url('dashboard/categories')}}"><em class="fa fa-bar-chart">&nbsp;</em> หมวดหมู่สินค้า</a></li>
			<li><a href="{{url('dashboard/products')}}"><em class="fa fa-bar-chart">&nbsp;</em> สินค้า</a></li>
			<li><a href="{{url('home')}}"><em class="fa fa-power-off">&nbsp;</em> กลับไปยังหน้าเว็บ </a></li>
		</ul>
	</div><!--/.sidebar-->
		
	
	<script src="https://medialoot.com/preview/lumino/js/jquery-1.11.1.min.js"></script>
	<script src="https://medialoot.com/preview/lumino/js/bootstrap.min.js"></script>
	<script src="https://medialoot.com/preview/lumino/js/chart.min.js"></script>
	<script src="https://medialoot.com/preview/lumino/js/chart-data.js"></script>
	<script src="https://medialoot.com/preview/lumino/js/easypiechart.js"></script>
	<script src="https://medialoot.com/preview/lumino/js/easypiechart-data.js"></script>
	<script src="https://medialoot.com/preview/lumino/js/bootstrap-datepicker.js"></script>
	<script src="https://medialoot.com/preview/lumino/js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		

</html>